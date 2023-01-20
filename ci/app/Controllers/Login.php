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

    public function login() {
        $data = array();
        if ($this->validation->run($_POST, "login")) {
            $loginCandidate = $this->mitgliedModel->getMitgliedByEmail($_POST['email']);

            if ($loginCandidate != null && password_verify($_POST['password'], $loginCandidate['mitgliedPassword'])) {
                $this->session->set("sessionUserId", $loginCandidate['mitgliedId']);

                $projekte = $this->projektModel->getProjekteForMitglied($loginCandidate['mitgliedId']);
                if (!empty($projekte["0"])) {
                    $this->session->set("currentProjectId", $projekte[0]["projektId"]);
                }

                return redirect()->to(base_url("./todos"));
            }
            else {
                $data['error'] = [
                    'password'  => 'Ungültige Anmeldedaten',
                    'email'     => 'Ungültige Anmeldedaten',
                ];
                $data['formValues'] = $_POST;
                $this->showLoginView($data);
            }
        }
        else {
            $data['error'] = $this->validation->getErrors();
            $data['formValues'] = $_POST;
            $this->showLoginView($data);
        }
    }

    public function logout() {
        $this->session->destroy();
        $data['showLogoutMessage'] = true;
        $this->showLoginView($data);
    }

    public function index()
    {
        if (!empty($this->session->get('sessionUserId'))) {
            return redirect()->to(base_url("./todos"));
        };
        $data = array();
        $this->showLoginView($data);
    }
    private function showLoginView($data) {
        $headData['title'] = 'Login';
        $headData['heading'] = 'Aufgabenplaner: Login';

        echo view('templates/header', $headData);
        echo view('login', $data);
        echo view('templates/footer');
    }
}