<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ProjektModel;
use App\Models\ReiterModel;
use Exception;

class Persons extends BaseController
{
    private MitgliedModel $mitgliedModel;
    private ProjektModel $projektModel;

    public function __construct() {

        $this->mitgliedModel = new MitgliedModel();
        $this->projektModel = new ProjektModel();

        helper(["form", "url"]);

    }

    public function index()
    {
        $headData['title'] = 'Mitglieder';
        $headData['heading'] = 'Aufgabenplaner: Mitglieder';
        $data['personen'] = $this->mitgliedModel->getMitglieder();

        // For each person check if it is assigned to current project (for checkbox in table)
        foreach ($data['personen'] as &$person)
        {
            $person['in_projekt'] = $this->projektModel->mitgliedInProjekt($person['mitgliedId'], $this->session->get('currentProjectId'));
            $person['ist_angemeldet'] = ($person['mitgliedId'] == $this->session->get('sessionUserId'));
        }

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('persons', $data);
        echo view('templates/footer');
    }

    public function save()
    {
        if (empty($_POST['userId']))
        {
            // Prüfe, dass alle Felder ausgefüllt sind
            if (empty($_POST['username']) | empty($_POST['email']) | empty($_POST['password'])) return redirect()->to(base_url('./persons'));

            try {
                // Speichere neuen Kunden
                $inserted_id = $this->mitgliedModel->createMitglied(
                    $_POST['username'],
                    $_POST['email'],
                    $_POST['password']
                );
            }
            catch (Exception $e) {
                return redirect()->to(base_url('./persons'));
            }

            // Lege ggf. Verknüpfung zu aktuellem Projekt an
            if (!empty($_POST['assigned'])) {
                $this->projektModel->addMitgliedToProject($inserted_id, $this->session->get("currentProjectId"));
            }
        }
        else
        {
            // Update bestehenden Kunden
            $username = empty($_POST['username']) ? "" : $_POST['username'];
            $email = empty($_POST['email']) ? "" : $_POST['email'];
            $assigned = !empty($_POST['assigned']);

            // Verhindere Passwortänderung wenn nicht eingeloggt
            if ($this->session->get('sessionUserId') == $_POST['userId']) {
                $password = empty($_POST['password']) ? "" : $_POST['password'];
            }
            else { $password = ''; }


            try {
                // Update table Mitglied
                $this->mitgliedModel->updateMitglied($_POST['userId'], $username, $email, $password, $assigned);
            }
            catch (Exception $e) {
                return redirect()->to(base_url('./persons'));
            }

            // Update Project Assignment
            if ($assigned && !$this->projektModel->mitgliedInProjekt($_POST['userId'], $this->session->get("currentProjectId")))
                $this->projektModel->addMitgliedToProject($_POST['userId'], $this->session->get("currentProjectId"));

            if (!$assigned && $this->projektModel->mitgliedInProjekt($_POST['userId'], $this->session->get("currentProjectId")))
                $this->projektModel->removeMitgliedFromProject($_POST['userId'], $this->session->get("currentProjectId"));
        }

        return redirect()->to(base_url('./persons'));
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $this->mitgliedModel->deleteMitglied($_GET['id']);
        }

        return redirect()->to(base_url("persons"));
    }
}