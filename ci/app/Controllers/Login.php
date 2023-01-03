<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $headData['title'] = 'Login';
        $headData['heading'] = 'Aufgabenplaner: Login';

        echo view('templates/header', $headData);
        echo view('login');
        echo view('templates/footer');
    }
}