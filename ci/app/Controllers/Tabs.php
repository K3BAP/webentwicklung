<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Tabs extends BaseController
{
    private ReiterModel $ReiterModel;

    public function __construct() {

        $this->ReiterModel = new ReiterModel();

    }
    public function index()
    {
        $headData['title'] = 'Reiter';
        $headData['heading'] = 'Aufgabenplaner: Reiter';
        $data['reiter'] = $this->ReiterModel->getReiter($this->session->get('currentProjectId'));

        $navbarData['currentProjectId'] = $this->session->get('currentProjectId');
        $navbarData['currentProjectName'] = $this->session->get('currentProjectName');

        echo view('templates/header', $headData);
        echo view('templates/sidebar', $navbarData);
        echo view('tabs', $data);
        echo view('templates/footer');
    }
}