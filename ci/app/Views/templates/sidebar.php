<div class="col-2">
    <div class="list-group">
        <a class="list-group-item text-danger" href="<?= base_url("/logout/") ?>">Logout</a>
        <a class="list-group-item text-primary" href="<?= base_url("/projects/") ?>">Projekte</a>
        <?php if(!empty($currentProjectId) && !empty($currentProjectName)): ?>
        <a class="list-group-item text-primary" href="<?= base_url("/todos/") ?>"><?= $currentProjectName ?></a>
        <a class="list-group-item text-primary ms-5" href="<?= base_url("/tabs/") ?>">Reiter</a>
        <a class="list-group-item text-primary ms-5" href="<?= base_url("/tasks/") ?>">Aufgaben</a>
        <a class="list-group-item text-primary ms-5" href="<?= base_url("/persons/") ?>">Personen</a>
        <?php endif; ?>
    </div>
</div>
