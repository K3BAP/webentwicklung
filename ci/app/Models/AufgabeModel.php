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

    public function deleteAufgabe(int $aufgabeId)
    {
        $aufgaben = $this->db->table("aufgabe");
        $aufgaben->where("aufgabeId", $aufgabeId);
        $aufgaben->delete();
    }

    public function createAufgabe(string $aufgabeName, string $aufgabeBeschreibung, $aufgabeFaellig, int $erstellerId, int $reiterId) {
        // Aufgabe erstellen
        $aufgaben = $this->db->table('aufgabe');
        $aufgaben->insert(array(
            'aufgabeName'                   => $aufgabeName,
            'aufgabeBeschreibung'           => $aufgabeBeschreibung,
            'aufgabeFaellig'                => $aufgabeFaellig ?? null,
            'aufgabeErstellerMitgliedId'    => $erstellerId,
            'aufgabeReiterId'               => $reiterId
        ));

        return $this->db->insertID();
    }

    public function editAufgabe(int $aufgabeId, string $aufgabeName, string $aufgabeBeschreibung, $aufgabeFaellig, int $erstellerId, int $reiterId) {
        // Aufgabe aktualisieren
        $aufgaben = $this->db->table('aufgabe');
        $aufgaben->where('aufgabeId', $aufgabeId);
        $aufgaben->update(array(
            'aufgabeName'                   => $aufgabeName,
            'aufgabeBeschreibung'           => $aufgabeBeschreibung,
            'aufgabeFaellig'                => $aufgabeFaellig ?? null,
            'aufgabeErstellerMitgliedId'    => $erstellerId,
            'aufgabeReiterId'               => $reiterId
        ));
    }

    public function setZustaendig(int $aufgabeId, $zustaendig) {
        $aufgabe_mitglied = $this->db->table('aufgabe_mitglied');

        // Bestehende Verknüpfungen entfernen
        $aufgabe_mitglied->where('aufgabeId', $aufgabeId);
        $aufgabe_mitglied->delete();

        // Aufgabe_Mitglied Verknüpfungen erstellen
        if (!empty($zustaendig)) {
            foreach ($zustaendig as $item) {
                $aufgabe_mitglied->insert(array(
                    'aufgabeId' => $aufgabeId,
                    'mitgliedId' => $item
                ));
            }
        }
    }
}