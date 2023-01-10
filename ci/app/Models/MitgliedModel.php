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

    public function getMitgliedByEmail(string $email = null)
    {
        if (!isset($email)) return null;

        $mitglieder = $this->db->table("mitglied");
        $mitglieder->select('*');
        $mitglieder->where("mitglied.mitgliedEmail", $email);

        $result = $mitglieder->get()->getResultArray();

        if (sizeof($result) < 1) return null;

        return $result[0];
    }
}