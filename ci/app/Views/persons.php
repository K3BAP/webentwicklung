<!-- MODAL DELETE DIALOG -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Wirklich löschen?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Soll das Mitglied wirklich gelöscht werden?</p>
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
            <?= form_open("persons/save", array('role' => 'form'))?>
                <div class="modal-body">

                    <input type="hidden" id="userIdInput" name="userId" readonly>
                    <div class="form-group mb-2">
                        <label for="usernameInput" class="mb-1">Name des Mitglieds:</label>
                        <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username">
                    </div>
                    <div class="form-group mb-2">
                        <label for="emailInput" class="mb-1">E-Mail-Adresse:</label>
                        <input type="text" class="form-control" id="emailInput" name="email" placeholder="E-Mail-Adresse eingeben">
                    </div>
                    <div class="form-group mb-2">
                        <label for="passwordInput" class="mb-1">Passwort:</label>
                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Passwort">
                    </div>
                    <div class="form-group form-check mb-2">
                        <input id="assignedCheck" name="assigned" type="checkbox" class="form-check-input">
                        <label for="assignedCheck" class="form-check-label">Dem Projekt zugeordnet</label>
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
<script type="text/javascript" defer src="<?= base_url("./JS/persons.js") ?>" ></script>

<!-- PAGE CONTENT -->
<div class="col-8">
    <table class="table table-hover mb-2">
        <thead>
        <tr class="table-light">
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">In Projekt</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($personen)): foreach ($personen as $item): ?>
            <tr>
                <td class="data-username"><?php echo($item['mitgliedUsername'] ?? ""); ?></td>
                <td class="data-email"><?php echo($item['mitgliedEmail'] ?? ""); ?></td>
                <td><input type="checkbox" class="form-check-input m-3 data-assigned" onclick="return false;" <?php if (isset($item['in_projekt']) and $item['in_projekt']): echo('checked=checked'); endif; ?> ></td>
                <td class="text-end">
                    <a
                            class="fa-regular fa-pen-to-square text-primary m-3"
                            role="button"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            data-bs-mitgliedid="<?= $item['mitgliedId'] ?>"
                            data-bs-pwplaceholder="unverändert"
                            data-bs-showpw=<?= $item['ist_angemeldet'] ? 'true' : 'false' ?>
                    ></a>
                    <a
                            class="fa-regular fa-trash-can text-danger m-3"
                            role="button"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-bs-username="<?= $item['mitgliedUsername'] ?>"
                            data-bs-delete-link="<?= base_url("persons/delete?id=") . $item['mitgliedId'] ?>"
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
            data-bs-pwplaceholder="Passwort eingeben"
    > <i class="fa-regular fa-plus"></i> </a>
</div>
