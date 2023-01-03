 <div class="col-8">
    <table class="table table-hover mb-5">
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
                <td><?php echo(isset($item['name']) ? $item['name'] : ""); ?></td>
                <td><?php echo(isset($item['beschreibung']) ? $item['beschreibung'] : ""); ?></td>
                <td><?php echo(isset($item['reiter']) ? $item['reiter'] : ""); ?></td>
                <td><?php echo(isset($item['zustaendig']) ? $item['zustaendig'] : ""); ?></td>
                <td class="text-end"><i class="fa-regular fa-trash-can text-primary m-3"></i> <i class="fa-regular fa-pen-to-square text-primary m-3"></i></td>
            </tr>
        <?php endforeach; endif;?>
        </tbody>
    </table>
    <form>
        <h2>Bearbeiten/Erstellen</h2>
        <div class="form-group mb-2">
            <label for="aufgabeBezeichnungInput" class="mb-1">Aufgabenbezeichnung:</label>
            <input type="text" class="form-control" id="aufgabeBezeichnungInput" placeholder="Aufgabe">
        </div>
        <div class="form-group mb-2">
            <label for="aufgabeBeschreibungText" class="mb-1">Beschreibung der Aufgabe:</label>
            <textarea id="aufgabeBeschreibungText" rows="4" class="form-control" placeholder="Beschreibung"></textarea>
        </div>
        <div class="form-group mb-2">
            <label for="erstellungsDatumInput" class="mb-1">Erstellungsdatum:</label>
            <input type="date" class="form-control" id="erstellungsDatumInput">
        </div>
        <div class="form-group mb-2">
            <label for="reiterBezeichnungInput" class="mb-1">fällig bis:</label>
            <input type="date" class="form-control" id="reiterBezeichnungInput">
        </div>
        <div class="form-group mb-2">
            <label for="reiterMenu" class="mb-1">Zugehöriger Reiter:</label>
            <select id="reiterMenu" class="form-select">
                <option label="ToDo"></option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="zustaendigMenu" class="mb-1">Zuständig:</label>
            <select id="zustaendigMenu" class="form-select">
                <option label="Max Mustermann"></option>
            </select>
        </div>
        <button class="btn btn-primary">Speichern</button>
        <button class="btn btn-info text-white">Reset</button>
    </form>
</div>
