<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ProjektModel;
use App\Models\ReiterModel;

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

        foreach ($data['personen'] as &$person)
        {
            $person['in_projekt'] = $this->projektModel->mitgliedInProjekt($person['mitgliedId'], $this->session->get('currentProjectId'));
        }

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('persons', $data);
        echo view('templates/footer');
    }

    public function save()
    {
        if (empty($_POST['username']) | empty($_POST['email']) | empty($_POST['password'])) return redirect()->to(base_url('./persons'));

        if (empty($_POST['userId']))
        {
            // Speichere neuen Kunden
            $inserted_id = $this->mitgliedModel->createMitglied(
                $_POST['username'],
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_DEFAULT)
            );

            // Lege ggf. Verknüpfung zu aktuellem Projekt an
            if (!empty($_POST['assigned'])) {
                $this->projektModel->addMitgliedToProject($inserted_id, $this->session->get("currentProjectId"));
            }
        }
        else
        {
            // Update bestehenden Kunden
        }


        return redirect()->to(base_url('./persons'));
    }
}