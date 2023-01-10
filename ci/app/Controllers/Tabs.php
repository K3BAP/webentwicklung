<?php

namespace App\Controllers;

use App\Models\AufgabeModel;
use App\Models\MitgliedModel;
use App\Models\ReiterModel;

class Tabs extends BaseController
{
    private ReiterModel $ReiterModel;
    private AufgabeModel $AufgabenModel;

    public function __construct() {

        $this->AufgabenModel = new AufgabeModel();
        $this->ReiterModel = new ReiterModel();

    }
    public function index()
    {
        $headData['title'] = 'Reiter';
        $headData['heading'] = 'Aufgabenplaner: Reiter';
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header', $headData);
        echo view('templates/sidebar');
        echo view('tabs', $data);
        echo view('templates/footer');
    }
}