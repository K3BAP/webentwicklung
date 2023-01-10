<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Projects extends BaseController
{
    public function index()
    {
        $headData['title'] = 'Projekte';
        $headData['heading'] = 'Aufgabenplaner: Projekte';

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('projects');
        echo view('templates/footer');
    }
}