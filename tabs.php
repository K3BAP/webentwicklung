<?php require_once('./common/database.php'); ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Reiter</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/092bee193d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <?php
    $heading_text = "Aufgabenplaner: Reiter";
    require("./common/heading.php");
    ?>
    <div class="row">
        <?php require("./common/sidebar.php"); ?>
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
    </div>
</div>
<br>
<br>
</body>