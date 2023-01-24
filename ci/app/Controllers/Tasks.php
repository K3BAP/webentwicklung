<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

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
        var_dump($_POST);
    }
}