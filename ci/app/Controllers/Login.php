<?php

namespace App\Controllers;

use App\Models\MitgliedModel;
use App\Models\ProjektModel;

class Login extends BaseController
{
    private MitgliedModel $mitgliedModel;
    private ProjektModel $projektModel;

    public function __construct()
    {
        $this->mitgliedModel = new MitgliedModel();
        $this->projektModel = new ProjektModel();

        helper(["form", "url"]);
    }

    public function index()
    {
        $loginCandidate = null;
        if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['agbaccept'])))
        {
            $loginCandidate = $this->mitgliedModel->getMitgliedByEmail($_POST['email']);
        };

        if ($loginCandidate != null && password_verify($_POST['password'], $loginCandidate['mitgliedPassword']))
        {
            $this->session->set("sessionUserId", $loginCandidate['mitgliedId']);

            $projekte = $this->projektModel->getProjekteForMitglied($loginCandidate['mitgliedId']);
            if (!empty($projekte["0"]))
            {
                $this->session->set("currentProjectId", $projekte[0]["projektId"]);
            }

            return redirect()->to(base_url("./todos"));
        }


        $headData['title'] = 'Login';
        $headData['heading'] = 'Aufgabenplaner: Login';

        //var_dump($_SESSION);
        $this->session->destroy(); //Zerstöre session vor neuer Anmeldung
        echo view('templates/header', $headData);
        echo view('login');
        echo view('templates/footer');
    }
}