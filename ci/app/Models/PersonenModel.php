<?php namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{


    public function getPersonen()
    {
        $personen = array(
            array(
                "name" => "Max Mustermann",
                "email" => "mustermann@muster.de",
                "in_projekt" => false
            ),    array(
                "name" => "Petra Müller",
                "email" => "petra@mueller.de",
                "in_projekt" => true
            ),
        );

        return $personen;
    }
}