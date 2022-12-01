<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
</head>
<body>
    <div class="container-fluid">
        <div class="bg-light mt-3 mb-3 p-5">
            <h1 class="text-center">Aufgabenplaner: Login</h1>
        </div>
        <div class="row">
            <div class="col-xxl-4 col-lg-3 col-md-2 col-sm-1 d-none d-sm-block"></div>
            <div class="col-xxl-4 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                <form>
                    <div class="form-group my-1">
                        <label for="loginEmail">Email-Adresse:</label>
                        <input id="loginEmail" type="text" class="form-control" placeholder="Email-Adresse eingeben">
                    </div>
                    <div class="form-group my-1">
                        <label for="loginPwd">Passwort:</label>
                        <input id="loginPwd" type="password" class="form-control" placeholder="Passwort">
                    </div>
                    <div class="form-group form-check my-1">
                        <input id="agbCheck" type="checkbox" class="form-check-input">
                        <label for="agbCheck" class="form-check-label">AGBs und Datenschutzbedingungen akzeptieren</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Einloggen</button>
                    <div class="form-group">
                        Noch nicht registriert? <a class="link-primary text-decoration-none" href="">Registrierung</a>
                    </div>
                    <div class="form-group mt-2">
                        Da der Login-Vorgang noch nicht realisiert wurde: <a class="link-primary text-decoration-none" href="./todos.php">Überspringen</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>