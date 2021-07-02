<?php
if(isset($_SESSION['user'])) {
echo <<<HTML
        <div class="welcom">
            <h1>Bienvenue {$_SESSION['user']->getFirstName()}</h1>
            <a class="btn" href="teams.php">Equipe</a>
        </div>
HTML;

}