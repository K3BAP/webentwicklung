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
                <td><?php echo(isset($item['name']) ? $item['name'] : ""); ?></td>
                <td><?php echo(isset($item['email']) ? $item['email'] : ""); ?></td>
                <td><input type="checkbox" class="form-check-input" <?php if (isset($item['in_projekt']) and $item['in_projekt']): echo('checked=checked'); endif; ?> ></td>
                <td class="text-end"><i class="fa-regular fa-trash-can text-primary m-3"></i> <i class="fa-regular fa-pen-to-square text-primary m-3"></i></td>
            </tr>
        <?php endforeach; endif;?>
        </tbody>
    </table>
    <form>
        <h2>Bearbeiten/Erstellen</h2>
        <div class="form-group mb-2">
            <label for="usernameInput" class="mb-1">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="usernameInput" placeholder="Username">
        </div>
        <div class="form-group mb-2">
            <label for="emailInput" class="mb-1">E-Mail-Adresse:</label>
            <input type="text" class="form-control" id="emailInput" placeholder="E-Mail-Adresse eingeben">
        </div>
        <div class="form-group mb-2">
            <label for="passwordInput" class="mb-1">Passwort:</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Passwort">
        </div>
        <div class="form-group form-check mb-2">
            <input id="assignedCheck" type="checkbox" class="form-check-input">
            <label for="assignedCheck" class="form-check-label">Dem Projekt zugeordnet</label>
        </div>
        <button class="btn btn-primary">Speichern</button>
        <button class="btn btn-info text-white">Reset</button>
    </form>
</div>
