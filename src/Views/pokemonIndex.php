<?php
include '../Models/User.php';
include '../Models/Team.php';
include '../Controllers/getIndexController.php';
include_once 'header.php';
include_once '../Functions/dump.php';
?>
<div class="container">
    <?php
    $pokedex = $_SESSION['indexController']->getPokemons();
    include 'welcom.php';
    include 'formView.php';
    echo '<ul class="pokemon-list">';
    foreach ($pokedex as $pokemon) {
        include '../Views/pokemonIndexListItem.php';
    }
    echo '</ul>';
    ?>
</div>
<ul class="pagination">
<?php
    for ($i = $_SESSION['indexController']->getPage(); $i < $_SESSION['indexController']->getPage() + 6; $i++) {
        echo $i > 2 ? '<li><a '. ($i === $_SESSION['indexController']->getPage() + 2 ? 'style="text-decoration:underline"' : '') .' href="http://localhost/pokedex-app/src/Views/pokemonIndex.php?page='. $i - 2 . '">'. ($i - 2) . ($_SESSION['indexController']->getPage() + 5 === $i ? '...' : '').'</a></li>' : '';
    }
    ?>
</ul>
<?php

include_once 'footer.php';


