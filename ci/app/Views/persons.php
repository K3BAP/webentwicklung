 <div class="col-8">
    <table class="table table-hover mb-5">
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
                <td><?php echo($item['mitgliedUsername'] ?? ""); ?></td>
                <td><?php echo($item['mitgliedEmail'] ?? ""); ?></td>
                <td><input type="checkbox" class="form-check-input" onclick="return false;" <?php if (isset($item['in_projekt']) and $item['in_projekt']): echo('checked=checked'); endif; ?> ></td>
                <td class="text-end">
                    <a href="<?php echo base_url("./persons/delete?id=") . $item['mitgliedId'] ?>" class="fa-regular fa-trash-can text-primary m-3"></a>
                    <a href="<?php echo base_url("./persons/index?editId=") . $item['mitgliedId'] ?>" class="fa-regular fa-pen-to-square text-primary m-3"></a>
                </td>
            </tr>
        <?php endforeach; endif;?>
        </tbody>
    </table>
    <?php echo form_open("persons/save", array('role' => 'form'))?>
        <h2>Bearbeiten/Erstellen</h2>
        <input type="hidden" id="userIdInput" name="userId" readonly
            <?php if (!empty($editPerson)) echo('value="' . $editPerson['mitgliedId'] . '"'); ?>
        >
        <div class="form-group mb-2">
            <label for="usernameInput" class="mb-1">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username"
                <?php if (!empty($editPerson)) echo('value="' . $editPerson['mitgliedUsername'] . '"'); ?>
            >
        </div>
        <div class="form-group mb-2">
            <label for="emailInput" class="mb-1">E-Mail-Adresse:</label>
            <input type="text" class="form-control" id="emailInput" name="email" placeholder="E-Mail-Adresse eingeben"
                <?php if (!empty($editPerson)) echo('value="' . $editPerson['mitgliedEmail'] . '"'); ?>
            >
        </div>
     <?php if(empty($editPerson) || !empty($showPasswordField)): ?>
        <div class="form-group mb-2">
            <label for="passwordInput" class="mb-1">Passwort:</label>
            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="<?php echo empty($editPerson)? "Passwort" : "unverändert" ?>">
        </div>
     <?php endif; ?>
        <div class="form-group form-check mb-2">
            <input id="assignedCheck" name="assigned" type="checkbox" class="form-check-input"
                <?php if (!empty($editPerson) && $editPerson['in_projekt']) echo('checked="checked"'); ?>
            >
            <label for="assignedCheck" class="form-check-label">Dem Projekt zugeordnet</label>
        </div>
        <button class="btn btn-primary" type="submit">Speichern</button>
        <button class="btn btn-info text-white" href="<?php echo base_url('./persons'); ?>">Reset</button>
    <?php echo form_close() ?>
</div>
