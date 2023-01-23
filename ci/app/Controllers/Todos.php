<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Todos extends BaseController
{
    private AufgabeModel $AufgabenModel;
    private ReiterModel $ReiterModel;

    public function __construct() {

        $this->AufgabenModel = new AufgabeModel();
        $this->ReiterModel = new ReiterModel();

    }
    public function index()
    {
        $headData['title'] = 'Todos';
        $headData['heading'] = $this->session->get('currentProjectName');;
        $data['reiter'] = $this->ReiterModel->getReiter();
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();

        $navbarData['currentProjectId'] = $this->session->get('currentProjectId');
        $navbarData['currentProjectName'] = $this->session->get('currentProjectName');

        echo view('templates/header', $headData);
        echo view('templates/sidebar', $navbarData);
        echo view('todos', $data);
        echo view('templates/footer');
    }
}