<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model
{


    public function getAufgaben()
    {
        $aufgaben = array(
            array(
                "name" => "HTML Datei erstellen",
                "beschreibung" => "HTML Datei erstellen",
                "reiter" => "ToDo",
                "zustaendig" => "Max Mustermann"
            ),
            array(
                "name" => "CSS Datei erstellen",
                "beschreibung" => "CSS Datei erstellen",
                "reiter" => "ToDo",
                "zustaendig" => "Max Mustermann"
            ),
            array(
                "name" => "PC eingeschaltet",
                "beschreibung" => "PC einschalten",
                "reiter" => "Erledigt",
                "zustaendig" => "Max Mustermann"
            ),
            array(
                "name" => "Kaffee trinken",
                "beschreibung" => "Kaffee trinken",
                "reiter" => "Erledigt",
                "zustaendig" => "Petra Müller"
            ),
            array(
                "name" => "Für die Uni lernen",
                "beschreibung" => "Für die Uni lernen",
                "reiter" => "Verschoben",
                "zustaendig" => "Max Mustermann"
            )
        );

        return $aufgaben;
    }
}