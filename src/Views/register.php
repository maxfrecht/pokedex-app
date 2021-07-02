<?php
include 'header.php';
?>
    <div class="container">
        <h1>S'inscrire</h1>
        <form action="../Controllers/Connexion/handle-register.php" method="post">
            <div class="form-group">
                <input placeholder="firstName" type="text" name="firstName" id="firstName">
                <label for="firstName">Prénom</label>
            </div>
            <div class="form-group">
                <input placeholder="lastName" type="text" name="lastName" id="lastName">
                <label for="lastName">Nom</label>
            </div>
            <div class="form-group">
                <input placeholder="e-mail" type="text" name="email" id="email">
                <label for="email">E-mail</label>
            </div>
            <div class="form-group">
                <input placeholder="Mot de passe" type="password" name="psw" id="psw">
                <label for="psw">Mot de passe</label>
            </div>
            <input class="btn" type="submit" value="Connexion">
        </form>
    </div>
<?php
include 'footer.php';