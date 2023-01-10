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
}