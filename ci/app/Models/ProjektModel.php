<?php namespace App\Models;

use CodeIgniter\Model;

class ProjektModel extends Model
{


    public function getProjekte()
    {
        $projekte = $this->db->table("projekt");
        $projekte->select("*");
        $projekte->orderBy("projektName");

        $result = $projekte->get();
        return $result->getResultArray();
    }

    public function getProjekteForMitglied(int $mitgliedId)
    {
        if (empty($mitgliedId)) return null;
        $projekt_mitglied = $this->db->table("projekt_mitglied");
        $projekt_mitglied->select("projektId");
        $projekt_mitglied->where("mitgliedId", $mitgliedId);

        $projekte = $this->db->table("projekt");
        $projekte->select("*");
        $projekte->whereIn("projektId", $projekt_mitglied);

        return $projekte->get()->getResultArray();
    }
}