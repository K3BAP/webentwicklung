<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;
use Exception;

class Tasks extends BaseController
{
    private AufgabeModel $aufgabenModel;
    private ReiterModel $reiterModel;
    private MitgliedModel $mitgliedModel;

    public function __construct() {
        $this->aufgabenModel = new AufgabeModel();
        $this->reiterModel = new ReiterModel();
        $this->mitgliedModel = new MitgliedModel();

        helper(["form", "url"]);
    }
    public function index()
    {
        $headData['title'] = 'Aufgaben';
        $headData['heading'] = 'Aufgabenplaner: Aufgaben';
        $data['aufgaben'] = $this->aufgabenModel->getAufgabenWithRefs($this->session->get("currentProjectId"));
        $data['reiter'] = $this->reiterModel->getReiter($this->session->get('currentProjectId'));
        $data['mitglieder'] = $this->mitgliedModel->getMitglieder();

        $navbarData['currentProjectId'] = $this->session->get('currentProjectId');
        $navbarData['currentProjectName'] = $this->session->get('currentProjectName');

        echo view('templates/header', $headData);
        echo view('templates/sidebar', $navbarData);
        echo view('tasks', $data);
        echo view('templates/footer');
    }

    public function save()
    {
        // Prüfe, dass alle Felder ausgefüllt sind
        if (empty($_POST['aufgabeBezeichnung']) | empty($_POST['aufgabeBeschreibung']) | empty($_POST['aufgabeReiter'])) return redirect()->to(base_url('./tasks'));

        if (empty($_POST['aufgabeId'])) {
            // Neue Aufgabe anlegen

            // Speichere neue Aufgabe
            $aufgabeId = $this->aufgabenModel->createAufgabe(
                $_POST['aufgabeBezeichnung'],
                $_POST['aufgabeBeschreibung'],
                $_POST['faelligDatum'] ?? null,
                $this->session->get('sessionUserId'),
                $_POST['aufgabeReiter'],
            );
        }
        else {
            // Bestehende Aufgabe aktualisieren
            $aufgabeId = $_POST['aufgabeId'];

            $this->aufgabenModel->editAufgabe(
                $aufgabeId,
                $_POST['aufgabeBezeichnung'],
                $_POST['aufgabeBeschreibung'],
                $_POST['faelligDatum'] ?? null,
                $this->session->get('sessionUserId'),
                $_POST['aufgabeReiter'],
            );
        }

        // Zuständige Mitglieder eintragen
        $this->aufgabenModel->setZustaendig(
            $aufgabeId,
            $_POST['zustaendig'] ?? null,
        );

        return redirect()->to(base_url("tasks"));
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $this->aufgabenModel->deleteAufgabe($_GET['id']);
        }

        return redirect()->to(base_url("tasks"));
    }
}