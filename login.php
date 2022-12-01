<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
</head>
<body>
    <div class="container-fluid">
        <div class="bg-light mt-3 mb-3 p-5">
            <h1 class="text-center">Aufgabenplaner: Login</h1>
        </div>
        <div class="container w-50">
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
</body>