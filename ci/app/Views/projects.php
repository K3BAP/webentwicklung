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
                    <label class="form-label" for="projektInput">Projektname:</label>
                    <input class="form-control" id="projektInput" placeholder="Projekt">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="beschreibungTextArea">Projektbeschreibung:</label>
                    <textarea class="form-control" id="beschreibungTextArea" placeholder="Beschreibung" rows="4"></textarea>
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

<!-- PAGE CONTENT -->
<div class="col-8">
    <form class="mb-3">
        <h2>Projekt auswählen:</h2>
        <select class="form-select">
            <option label="- bitte auswählen -"></option>
            <?php if(!empty($projects)): foreach($projects as $item): ?>
            <option value="<?= $item['projektId'] ?>" label="<?= $item['projektName'] ?>"></option>
            <?php endforeach; endif; ?>
        </select>
        <button class="btn btn-primary mt-3">Auswählen</button>
        <button class="btn btn-primary mt-3">Bearbeiten</button>
        <a
                class="btn btn-primary mt-3"
                role="button"
                data-bs-toggle="modal"
                data-bs-target="#editModal"
        >Neu</a>
        <button class="btn btn-danger mt-3">Löschen</button>
    </form>
</div>
