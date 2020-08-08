<?php

$active = '';
include("includes/header.php");
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h2 id="login-title">Connectez-vous Ici</h2>
                </div>
                <form method="post" action="checkout.php">
                    <div class="form-group">
                        <label>E-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="u_email" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input name="u_pass" type="password" class="form-control" required />
                        </div>
                    </div>
                    <div class="text-center">
                        <button name="login" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i> Connexion
                        </button>
                    </div>
                </form>
                <div class="btn-action">
                    <a href="enregistrement.php">Mot de Passe Oubié ?</a>
                    <a href="enregistrement.php">Pas de Compte ?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>