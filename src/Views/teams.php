<?php
include '../Models/User.php';
include '../Models/Team.php';
include '../Controllers/getIndexController.php';
include '../Controllers/teamController.php';
include 'header.php';
?>
    <div class="container">
        <form action="./teams.php" method="post">
            <div class="form-group">
                <input placeholder="nom" type="text" name="name" id="name">
                <label for="name">Nom de l'équipe</label>
            </div>
            <input type="submit" value="Nouvelle équipe">
        </form>
        <ul class="teams-list">
            <?php
            foreach ($_SESSION['team']->getTeams() as $team) {
                echo '<li class="teams-list-item">' . $team->getName() . '</li>';
            }
            ?>
        </ul>
    </div>
<?php
include 'footer.php';
