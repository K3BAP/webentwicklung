<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Tasks extends BaseController
{
    private AufgabeModel $AufgabenModel;

    public function __construct() {

        $this->AufgabenModel = new AufgabeModel();

    }
    public function index()
    {
        $headData['title'] = 'Aufgaben';
        $headData['heading'] = 'Aufgabenplaner: Aufgaben';
        $data['aufgaben'] = $this->AufgabenModel->getAufgabenWithRefs();

        $navbarData['currentProjectId'] = $this->session->get('currentProjectId');
        $navbarData['currentProjectName'] = $this->session->get('currentProjectName');

        echo view('templates/header', $headData);
        echo view('templates/sidebar', $navbarData);
        echo view('tasks', $data);
        echo view('templates/footer');
    }
}