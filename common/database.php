<?php
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