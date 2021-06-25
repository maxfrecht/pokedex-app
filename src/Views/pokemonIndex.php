<?php
include '../Controllers/getIndexController.php';
include_once 'header.php';
?>
<div class="container">
    <?php
    /** @var pokemonIndexController $indexController */
    $pokedex = $_SESSION['indexController']->getPokemons();
    echo '<ul class="pokemon-list">';
    foreach ($pokedex as $pokemon) {
        include '../Views/pokemonIndexListItem.php';
    }
    echo '</ul>';
    ?>
    <a href="http://localhost:8000/src/Functions/destroySession.php">Restaurer la session</a>
</div>
<?php
include_once 'footer.php';


