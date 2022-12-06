<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Projekte</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
</head>
<body>
<div class="container-fluid">
    <?php
    $heading_text = "Aufgabenplaner: Projekte";
    require("./common/heading.php");
    ?>
    <div class="row">
        <?php require("./common/sidebar.php"); ?>

        <div class="col-8">
            <form class="mb-3">
                <h2>Projekt auswählen:</h2>
                <select class="form-select">
                    <option label="- bitte auswählen -"></option>
                </select>
                <button class="btn btn-primary mt-3">Auswählen</button>
                <button class="btn btn-primary mt-3">Bearbeiten</button>
                <button class="btn btn-danger mt-3">Löschen</button>
            </form>
            <form>
                <h2>Projekt bearbeiten/erstellen:</h2>
                <div class="form-group mb-3">
                    <label class="form-label" for="projektInput">Projektname:</label>
                    <input class="form-control" id="projektInput" placeholder="Projekt">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="beschreibungTextArea">Projektbeschreibung:</label>
                    <textarea class="form-control" id="beschreibungTextArea" placeholder="Beschreibung" rows="4"></textarea>
                </div>
                <button class="btn btn-primary">Speichern</button>
                <button class="btn btn-info text-white">Reset</button>
            </form>
        </div>
    </div>
</div>
</body>