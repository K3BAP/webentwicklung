 <div class="row">
        <div class="col-xxl-4 col-lg-3 col-md-2 col-sm-1 d-none d-sm-block"></div>
        <div class="col-xxl-4 col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <?php if (!empty($showLogoutMessage)): ?>
            <div class="alert alert-primary alert-dismissible fade show">
                Erfolgreich abgemeldet!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?= form_open('login', array('role' => 'form')) ?>
                <div class="form-group my-1">
                    <label for="loginEmail">Email-Adresse:</label>
                    <input
                        id="loginEmail"
                        name="email"
                        type="text"
                        class="form-control <?=(isset($error['email']) ? 'is-invalid' : "") ?>"
                        placeholder="Email-Adresse eingeben"
                        value="<?= $formValues['email'] ?? "" ?>"
                    >
                    <div class="invalid-feedback">
                        <?= $error['email'] ?? '' ?>
                    </div>
                </div>
                <div class="form-group my-1">
                    <label for="loginPwd">Passwort:</label>
                    <input id="loginPwd" name="password" type="password" class="form-control
                    <?= isset($error['password']) ? 'is-invalid' : "" ?>" placeholder="Passwort">
                    <div class="invalid-feedback">
                        <?= $error['password'] ?? '' ?>
                    </div>
                </div>
                <div class="form-group form-check my-1">
                    <input id="agbCheck" name="agbaccept" type="checkbox" class="form-check-input
                    <?= isset($error['agbaccept']) ? 'is-invalid' : "" ?>">
                    <label for="agbCheck" class="form-check-label">AGBs und Datenschutzbedingungen akzeptieren</label>
                </div>
                <button type="submit" class="btn btn-primary">Einloggen</button>
                <div class="form-group">
                    Noch nicht registriert? <a class="link-primary text-decoration-none" href="">Registrierung</a>
                </div>
            <?= form_close()?>
        </div>
    </div>
