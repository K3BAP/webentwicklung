<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Persons extends BaseController
{
    private MitgliedModel $PersonenModel;

    public function __construct() {

        $this->PersonenModel = new MitgliedModel();

    }
    public function index()
    {
        $headData['title'] = 'Mitglieder';
        $headData['heading'] = 'Aufgabenplaner: Mitglieder';
        $data['personen'] = $this->PersonenModel->getMitglieder();

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('persons', $data);
        echo view('templates/footer');
    }
}