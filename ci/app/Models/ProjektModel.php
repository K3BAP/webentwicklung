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
}