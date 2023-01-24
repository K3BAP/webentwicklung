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

        $navbarData['currentProjectId'] = $this->session->get('currentProjectId');
        $navbarData['currentProjectName'] = $this->session->get('currentProjectName');

        echo view('templates/header', $headData);
        echo view('templates/sidebar', $navbarData);
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
                    $_POST['beschreibung'],
                    $this->session->get('sessionUserId')
                );
                $this->projektModel->addMitgliedToProject($this->session->get("sessionUserId"), $inserted_id);
            }
            catch (Exception $e) {
                return redirect()->to(base_url('./projects'));
            }
        }
        else
        {
            // Update bestehendes Projekt
            $projektName = empty($_POST['projektName']) ? "" : $_POST['projektName'];
            $projektBeschreibung = empty($_POST['beschreibung']) ? "" : $_POST['beschreibung'];

            try {
                // Update table Mitglied
                $this->projektModel->updateProject($_POST['projektId'], $projektName, $projektBeschreibung);
            }
            catch (Exception $e) {
                return redirect()->to(base_url('./persons'));
            }
        }

        return redirect()->to(base_url('./projects'));
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $this->projektModel->deleteProject($_GET['id']);
            if ($this->session->get('currentProjectId') == $_GET['id'])
                $this->session->remove(['currentProjectId', 'currentProjectName']);
        }

        return redirect()->to(base_url("projects"));
    }

    public function load()
    {
        if (!empty($_GET['id'])) {
            $project = $this->projektModel->getProjekte($_GET['id']);
            $this->session->set([
                'currentProjectId'      => $project['projektId'],
                'currentProjectName'    => $project['projektName']
            ]);
        }
        return redirect()->to(base_url("projects"));
    }
}