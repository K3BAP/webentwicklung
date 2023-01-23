<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabeModel extends Model
{


    public function getAufgaben()
    {
        $aufgaben = $this->db->table("aufgabe");
        $aufgaben->select("*");
        $aufgaben->orderBy("aufgabeName");

        $result = $aufgaben->get();
        return $result->getResultArray();
    }

    public function getAufgabenWithRefs()
    {
        $aufgaben = $this->db->table("aufgabe");
        $aufgaben->select("aufgabe.aufgabeId, aufgabe.aufgabeName, aufgabe.aufgabeBeschreibung, reiter.reiterName, GROUP_CONCAT(mitglied.mitgliedUsername SEPARATOR '<br />') as zustaendig");
        $aufgaben->join("reiter", "aufgabe.aufgabeReiterId = reiter.reiterId");
        $aufgaben->join("aufgabe_mitglied", "aufgabe_mitglied.aufgabeId = aufgabe.aufgabeId", "LEFT OUTER");
        $aufgaben->join("mitglied", "mitglied.mitgliedId = aufgabe_mitglied.mitgliedId", "LEFT OUTER");
        $aufgaben->groupBy("aufgabe.aufgabeId");
        $aufgaben->orderBy("aufgabe.aufgabeName");

        $result = $aufgaben->get();
        return $result->getResultArray();
    }
}