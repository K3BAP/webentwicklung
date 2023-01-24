<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{


    public function getReiter(int $projektId)
    {
        $reiter = $this->db->table("reiter");
        $reiter->select("*");
        $reiter->where("reiterProjektId", $projektId);
        $reiter->orderBy("reiterName");

        $result = $reiter->get();
        return $result->getResultArray();
    }
}