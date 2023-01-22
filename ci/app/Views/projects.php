<!-- MODAL CREATE / EDIT DIALOG -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Bearbeiten/Erstellen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open("projects/save", array('role' => 'form'))?>
            <div class="modal-body">

                <input type="hidden" id="projektIdInput" name="projektId" readonly>
                <div class="form-group mb-3">
                    <label class="form-label" for="projektNameInput">Projektname:</label>
                    <input class="form-control" id="projektNameInput" name="projektName" placeholder="Projekt">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="beschreibungTextArea">Projektbeschreibung:</label>
                    <textarea class="form-control" id="beschreibungTextArea" name="beschreibung" placeholder="Beschreibung" rows="4"></textarea>
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
<script type="text/javascript" defer src="<?= base_url("./JS/projects.js") ?>" ></script>

<!-- PAGE CONTENT -->
<div class="col-8">
    <h2>Projekt auswählen:</h2>
    <div class="row">
        <div class="col-10">
            <select id="projectSelect" class="form-select">
                <?php if(!empty($projects)): foreach($projects as $item): ?>
                    <option
                            value=<?= $item['projektId'] ?>
                            label="<?= $item['projektName'] ?>"
                            data-bs-beschreibung="<?= $item['projektBeschreibung'] ?>"
                    ></option>
                <?php endforeach; endif; ?>
            </select>
        </div>

        <div class="btn-toolbar col-2" role="toolbar">
            <div class="btn-group me-2">
                <a
                        class="btn btn-primary"
                        role="button"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        data-bs-mode="edit"
                ><i class="fa-regular fa-pen-to-square"></i></a>
                <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
            </div>
            <div class="btn-group">
                <a
                        class="btn btn-outline-primary"
                        role="button"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        data-bs-mode="new"
                ><i class="fa-regular fa-plus"></i></a>
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3">Projekt laden</button>
</div>
