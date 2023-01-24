<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabeModel extends Model
{


    public function getAufgaben($projectId)
    {
        $aufgaben = $this->db->table("aufgabe");
        $aufgaben->select("*");
        $aufgaben->join("reiter", "aufgabe.aufgabeReiterId = reiter.reiterId");
        $aufgaben->where("reiter.reiterProjektId", $projectId);
        $aufgaben->orderBy("aufgabeName");

        $result = $aufgaben->get();
        return $result->getResultArray();
    }

    public function getAufgabenWithRefs($projectId)
    {
        $aufgaben = $this->db->table("aufgabe");
        $aufgaben->select("aufgabe.*, reiter.*, GROUP_CONCAT(mitglied.mitgliedUsername SEPARATOR '<br />') as zustaendig, GROUP_CONCAT(mitglied.mitgliedId SEPARATOR ',') as zustaendigIds");
        $aufgaben->join("reiter", "aufgabe.aufgabeReiterId = reiter.reiterId");
        $aufgaben->join("aufgabe_mitglied", "aufgabe_mitglied.aufgabeId = aufgabe.aufgabeId", "LEFT OUTER");
        $aufgaben->join("mitglied", "mitglied.mitgliedId = aufgabe_mitglied.mitgliedId", "LEFT OUTER");
        $aufgaben->where("reiter.reiterProjektId", $projectId);
        $aufgaben->groupBy("aufgabe.aufgabeId");
        $aufgaben->orderBy("aufgabe.aufgabeName");

        $result = $aufgaben->get();
        return $result->getResultArray();
    }
}