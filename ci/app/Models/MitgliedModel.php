<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliedModel extends Model
{
    public function getMitglieder()
    {
        $mitglieder = $this->db->table("mitglied");
        $mitglieder->select("*");
        $mitglieder->orderBy("mitgliedUsername");

        $result = $mitglieder->get();
        return $result->getResultArray();
    }
}