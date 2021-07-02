<?php
include 'header.php';
?>
<div class="container">
    <h1>Se connecter</h1>
    <form action="../Controllers/Connexion/handle-connect.php" method="post">
        <div class="form-group">
            <input placeholder="e-mail" type="text" name="email" id="email">
            <label for="email">E-mail</label>
        </div>
        <div class="form-group">
            <input placeholder="Mot de passe" type="text" name="psw" id="psw">
            <label for="psw">Mot de passe</label>
        </div>
        <input class="btn" type="submit" value="Connexion">
    </form>
</div>
<?php
include 'footer.php';