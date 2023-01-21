<?php

namespace App\Controllers;

use App\Models\ProjektModel;

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
}