<div class="col-8">
    <table class="table table-hover mb-5">
        <thead>
        <tr class="table-light">
            <th scope="col">Name</th>
            <th scope="col">Beschreibung</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($reiter)): foreach ($reiter as $item): ?>
        <tr>
            <td><?php echo(isset($item['name']) ? $item['name'] : ""); ?></td>
            <td><?php echo(isset($item['beschreibung']) ? $item['beschreibung'] : ""); ?></td>
            <td class="text-end"><i class="fa-regular fa-trash-can text-primary m-3"></i> <i class="fa-regular fa-pen-to-square text-primary m-3"></i></td>
        </tr>
        <?php endforeach; endif;?>
        </tbody>
    </table>
    <form>
        <h2>Bearbeiten/Erstellen</h2>
        <div class="form-group mb-2">
            <label for="reiterBezeichnungInput" class="mb-1">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="reiterBezeichnungInput" placeholder="Reiter">
        </div>
        <div class="form-group mb-2">
            <label for="reiterBeschreibungText" class="mb-1">Beschreibung:</label>
            <textarea id="reiterBeschreibungText" rows="4" class="form-control" placeholder="Beschreibung"></textarea>
        </div>
        <button class="btn btn-primary">Speichern</button>
        <button class="btn btn-info text-white">Reset</button>
    </form>
</div>
