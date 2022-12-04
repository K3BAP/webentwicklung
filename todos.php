<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
</head>
<body>
<div class="container-fluid">
    <?php
    $heading_text = "Aufgabenplaner: Todos (Aktuelles Projekt)";
    require("./common/heading.php");
    ?>
    <div class="row">
        <?php require("./common/sidebar.php"); ?>
        <div class="col-10">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            ToDo:
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">HTML Datei erstellen (Max Mustermann)</div>
                            <div class="list-group-item">CSS Datei erstellen (Max Mustermann)</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Erledigt:
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">PC Eingeschaltet (Petra Müller)</div>
                            <div class="list-group-item">Kaffee trinken (Petra Müller)</div>
                        </div>
                    </div>
                </div><div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Verschoben:
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">Für die Uni lernen (Max Mustermann)</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>