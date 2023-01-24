<!-- MODAL DELETE DIALOG -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Wirklich löschen?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Soll die Aufgabe wirklich gelöscht werden?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <a id="deleteBtn" type="button" class="btn btn-danger" >Löschen</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CREATE / EDIT DIALOG -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Bearbeiten/Erstellen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open("tasks/save", array('role' => 'form'))?>
            <div class="modal-body">

                <input type="hidden" id="aufgabeIdInput" name="aufgabeId" readonly>
                <div class="form-group mb-2">
                    <label for="aufgabeBezeichnungInput" class="mb-1">Aufgabenbezeichnung:</label>
                    <input name="aufgabeBezeichnung" type="text" class="form-control" id="aufgabeBezeichnungInput" placeholder="Aufgabe">
                </div>
                <div class="form-group mb-2">
                    <label for="aufgabeBeschreibungText" class="mb-1">Beschreibung der Aufgabe:</label>
                    <textarea name="aufgabeBeschreibung" id="aufgabeBeschreibungText" rows="4" class="form-control" placeholder="Beschreibung"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="erstellungsDatumInput" class="mb-1">Erstellungsdatum:</label>
                    <input type="date" class="form-control" id="erstellungsDatumInput" readonly disabled>
                </div>
                <div class="form-group mb-2">
                    <label for="faelligDatumInput" class="mb-1">fällig bis:</label>
                    <input name="faelligDatum" type="date" class="form-control" id="faelligDatumInput">
                </div>
                <div class="form-group mb-2">
                    <label for="reiterMenu" class="mb-1">Zugehöriger Reiter:</label>
                    <select name="aufgabeReiter" id="reiterMenu" class="form-select">
                        <?php if(!empty($reiter)): foreach ($reiter as $item): ?>
                        <option value="<?= $item['reiterId'] ?>" label="<?= $item['reiterName'] ?>" ></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="zustaendigMenu" class="mb-1">Zuständig:</label>
                    <select name="zustaendig[]" id="zustaendigMenu" class="form-select" size=4 multiple>
                    <?php if(!empty($mitglieder)): foreach ($mitglieder as $item): ?>
                    <option value="<?= $item['mitgliedId'] ?>" label="<?= $item['mitgliedUsername'] ?>"></option>
                    <?php endforeach; endif; ?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <button id="saveBtn" type="submit" class="btn btn-primary" >Speichern</button>
            </div>
            <?= form_close() ?>

        </div>
    </div>
</div>

<!-- JS -->
<script type="text/javascript" defer src="<?= base_url("./JS/tasks.js") ?>" ></script>

<!-- PAGE CONTENT -->
<div class="col-8">
    <table class="table table-hover mb-2">
        <thead>
        <tr class="table-light">
            <th scope="col">Aufgabenbezeichnung:</th>
            <th scope="col">Beschreibung der Aufgabe:</th>
            <th scope="col">Reiter:</th>
            <th scope="col">Zuständig:</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($aufgaben)): foreach ($aufgaben as $item): ?>
            <tr>
                <td class="data-name"><?= ($item['aufgabeName'] ?? ""); ?></td>
                <td class="data-beschreibung"><?= ($item['aufgabeBeschreibung'] ?? ""); ?></td>
                <td><?= ($item['reiterName'] ?? ""); ?></td>
                <td class="data-zustaendig"><?= ($item['zustaendig'] ?? "--"); ?></td>
                <td class="text-end">
                    <a
                            class="fa-regular fa-pen-to-square text-primary m-3"
                            role="button"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            data-bs-aufgabeid="<?= $item['aufgabeId'] ?>"
                            data-bs-erstellt="<?= $item['aufgabeErstellt'] ?>"
                            data-bs-faellig="<?= $item['aufgabeFaellig'] ?>"
                            data-bs-reiterid="<?= $item['aufgabeReiterId'] ?>"
                            data-bs-zustaendig="<?= $item['zustaendigIds'] ?>"
                    ></a>
                    <a
                            class="fa-regular fa-trash-can text-danger m-3"
                            role="button"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-bs-taskname="<?= $item['aufgabeName'] ?>"
                            data-bs-delete-link="<?= base_url("tasks/delete?id=") . $item['aufgabeId'] ?>"
                    ></a>
                </td>
            </tr>
        <?php endforeach; endif;?>
        </tbody>
    </table>
    <a
            class="btn btn-outline-primary"
            role="button"
            data-bs-toggle="modal"
            data-bs-target="#editModal"
    > <i class="fa-regular fa-plus"></i> </a>
</div>
