 <div class="row">
        <div class="col-xxl-4 col-lg-3 col-md-2 col-sm-1 d-none d-sm-block"></div>
        <div class="col-xxl-4 col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <?php echo form_open('login/index', array('role' => 'form')) ?>
                <div class="form-group my-1">
                    <label for="loginEmail">Email-Adresse:</label>
                    <input id="loginEmail" name="email" type="text" class="form-control" placeholder="Email-Adresse eingeben">
                </div>
                <div class="form-group my-1">
                    <label for="loginPwd">Passwort:</label>
                    <input id="loginPwd" name="password" type="password" class="form-control" placeholder="Passwort">
                </div>
                <div class="form-group form-check my-1">
                    <input id="agbCheck" name="agbaccept" type="checkbox" class="form-check-input">
                    <label for="agbCheck" class="form-check-label">AGBs und Datenschutzbedingungen akzeptieren</label>
                </div>
                <button type="submit" class="btn btn-primary">Einloggen</button>
                <div class="form-group">
                    Noch nicht registriert? <a class="link-primary text-decoration-none" href="">Registrierung</a>
                </div>
            <?php echo form_close()?>
        </div>
    </div>
