<div class="col-2"></div>
<nav class="navbar navbar-expand-lg col-8 bg-light rounded mb-2">
    <div class="container-fluid">
        <div class="navbar-brand" href="#">Aufgabenplaner</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("/projects/") ?>">Projekte</a>
                </li>
                <?php if(!empty($currentProjectId) && !empty($currentProjectName)): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $currentProjectName ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url("/todos/") ?>">Übersicht</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url("/tabs/") ?>">Reiter</a></li>
                        <li><a class="dropdown-item" href="<?= base_url("/tasks/") ?>">Aufgaben</a></li>
                        <li><a class="dropdown-item" href="<?= base_url("/persons/") ?>">Mitglieder</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <a class="btn btn-outline-danger" href="<?= base_url("/logout/") ?>">Logout</a>

        </div>
</nav>
<div class="col-2"></div>
<div class="col-2"></div>
