<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{


    public function getReiter()
    {
        $reiter = $this->db->table("reiter");
        $reiter->select("*");
        $reiter->orderBy("reiterName");

        $result = $reiter->get();
        return $result->getResultArray();
    }
}