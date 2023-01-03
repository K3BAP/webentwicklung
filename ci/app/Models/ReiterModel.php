<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{


    public function getReiter()
    {
        $reiter = array(
            array(
                "name" => "ToDo",
                "beschreibung" => "Dinge, die erledigt werden müssen."
            ),
            array(
                "name" => "Erledigt",
                "beschreibung" => "Dinge, die erledigt sind."
            ),
            array(
                "name" => "Verschoben",
                "beschreibung" => "Dinge, die später erledigt werden."
            ),
        );

        return $reiter;
    }
}