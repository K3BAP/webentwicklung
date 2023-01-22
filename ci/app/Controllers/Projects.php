<?php

namespace App\Controllers;

use App\Models\ProjektModel;
use Exception;

class Projects extends BaseController
{
    private ProjektModel $projektModel;

    public function __construct() {

        $this->projektModel = new ProjektModel();

        helper(["form", "url"]);
    }
    public function index()
    {
        $headData['title'] = 'Projekte';
        $headData['heading'] = 'Aufgabenplaner: Projekte';

        $data['projects'] = $this->projektModel->getProjekte();

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('projects', $data);
        echo view('templates/footer');
    }

    public function save() {
        if (empty($_POST['projektId']))
        {
            // Prüfe, dass alle Felder ausgefüllt sind
            if (empty($_POST['projektName']) | empty($_POST['beschreibung'])) return redirect()->to(base_url('./projects'));

            try {
                // Speichere neues Projekt und füge aktuellen Benutzer zum Projekt hinzu
                $inserted_id = $this->projektModel->createProject(
                    $_POST['projektName'],
                    $_POST['beschreibung']
                );
                $this->projektModel->addMitgliedToProject($this->session->get("sessionUserId"), $inserted_id);
            }
            catch (Exception $e) {
                return redirect()->to(base_url('./projects'));
            }
        }
        else
        {

        }

        return redirect()->to(base_url('./projects'));
    }
}