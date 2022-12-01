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
   <div class="bg-light mt-3 mb-3 p-5">
       <h1 class="text-center">Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
   </div>
    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <div class="list-group-item text-primary">Login</div>
                <div class="list-group-item text-primary">Projekte</div>
                <div class="list-group-item text-primary">Aktuelles Projekt</div>
                <div class="list-group-item text-primary ms-5">Reiter</div>
                <div class="list-group-item text-primary ms-5">Aufgaben</div>
                <div class="list-group-item text-primary ms-5">Mitglieder</div>
            </div>
        </div>
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