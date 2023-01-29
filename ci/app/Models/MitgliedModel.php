<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliedModel extends Model
{
    public function getMitgliederWithInProjekt()
    {
        $mitglieder = $this->db->table("mitglied");
        $mitglieder->select("mitglied.*, (mitglied.mitgliedId in (
            SELECT mitgliedId
            FROM projekt_mitglied
            WHERE projektId = ". $_SESSION['currentProjectId'] .")) 
            as inProjekt");
        $mitglieder->orderBy("mitgliedUsername");

        $result = $mitglieder->get();
        return $result->getResultArray();
    }

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

    public function createMitglied(string $mitgliedUsername, string $mitgliedEmail, string $mitgliedPassword)
    {
        $mitglieder = $this->db->table("mitglied");
        $mitglieder->insert(array(
            'mitgliedUsername' => $mitgliedUsername,
            'mitgliedEmail' => $mitgliedEmail,
            'mitgliedPassword' => password_hash($mitgliedPassword, PASSWORD_DEFAULT)
        ));
        return $this->db->insertID();
    }

    public function updateMitglied(int $mitgliedId, string $mitgliedUsername, string $mitgliedEmail, string $mitgliedPassword)
    {
        if (empty($mitgliedId)) return redirect()->to(base_url("./persons"));

        $updateStatement = array();
        if (!empty($mitgliedUsername)) $updateStatement['mitgliedUsername'] = $mitgliedUsername;
        if (!empty($mitgliedEmail)) $updateStatement['mitgliedEmail'] = $mitgliedEmail;
        if (!empty($mitgliedPassword)) $updateStatement['mitgliedPassword'] = password_hash($mitgliedPassword, PASSWORD_DEFAULT);

        $mitglieder = $this->db->table("mitglied");
        $mitglieder->where("mitgliedId", $mitgliedId);

        $mitglieder->update($updateStatement);
    }

    public function deleteMitglied(int $mitgliedId)
    {
        $mitglieder = $this->db->table("mitglied");
        $mitglieder->where("mitgliedId", $mitgliedId);
        $mitglieder->delete();
    }
}