<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\PersonenModel;
use App\Models\ReiterModel;

class Persons extends BaseController
{
    private PersonenModel $PersonenModel;

    public function __construct() {

        $this->PersonenModel = new PersonenModel();

    }
    public function index()
    {
        $headData['title'] = 'Aufgaben';
        $headData['heading'] = 'Aufgabenplaner: Aufgaben';
        $data['personen'] = $this->PersonenModel->getPersonen();

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('persons', $data);
        echo view('templates/footer');
    }
}