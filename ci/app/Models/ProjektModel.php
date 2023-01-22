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

    public function mitgliedInProjekt(int $mitgliedId, int $projektId): ?bool
    {
        if (empty($mitgliedId) || empty($projektId)) return null;

        $projekt_mitglied = $this->db->table("projekt_mitglied");
        $projekt_mitglied->select("projektId");
        $projekt_mitglied->where("mitgliedId", $mitgliedId);
        $projekt_mitglied->where("projektId", $projektId);

        if($projekt_mitglied->countAllResults() >= 1) return true;
        else return false;
    }

    public function addMitgliedToProject(int $mitgliedId, int $projektId)
    {
        // Chech if person is already assigned
        $projekt_mitglied = $this->db->table("projekt_mitglied");
        $projekt_mitglied->select('*');
        $projekt_mitglied->where(array(
            "mitgliedId" => $mitgliedId,
            "projektId" =>  $projektId
        ));

        // If not already assigned, create assignment.
        if ($projekt_mitglied->countAllResults() == 0) {
            $projekt_mitglied->insert(array(
                "mitgliedId" => $mitgliedId,
                "projektId" => $projektId
            ));
        }
    }

    public function removeMitgliedFromProject(int $mitgliedId, int $projektId)
    {
        $projekt_mitglied = $this->db->table("projekt_mitglied");
        $projekt_mitglied->where(array(
            "mitgliedId" => $mitgliedId,
            "projektId" =>  $projektId
        ));
        $projekt_mitglied->delete();
    }

    public function createProject(string $projektName, string $projektBeschreibung) {
        $mitglieder = $this->db->table("projekt");
        $mitglieder->insert(array(
            'projektName' => $projektName,
            'projektBeschreibung' => $projektBeschreibung
        ));
        return $this->db->insertID();
    }

    public function updateProject(int $projektId, string $projektName, string $projektBeschreibung)
    {
        if (empty($projektId)) return redirect()->to(base_url("./projects"));

        $updateStatement = array();
        if (!empty($projektName)) $updateStatement['projektName'] = $projektName;
        if (!empty($projektBeschreibung)) $updateStatement['projektBeschreibung'] = $projektBeschreibung;

        $projekte = $this->db->table("projekt");
        $projekte->where("projektId", $projektId);

        $projekte->update($updateStatement);
    }
}