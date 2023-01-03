<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\PersonenModel;
use App\Models\ReiterModel;

class Todos extends BaseController
{
    private AufgabenModel $AufgabenModel;
    private ReiterModel $ReiterModel;

    public function __construct() {

        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();

    }
    public function index()
    {
        $headData['title'] = 'Todos';
        $headData['heading'] = 'Aufgabenplaner: Todos (Aktuelles Projekt)';
        $data['reiter'] = $this->ReiterModel->getReiter();
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('todos', $data);
        echo view('templates/footer');
    }
}