<?php
include_once '../Controllers/getIndexController.php';
include_once '../Controllers/pokemonDetailController.php';
include_once 'header.php';
$detailController = new pokemonDetailController();
$pokemon = $detailController->getPokemon();
?>
    <div class="container" style="height: fit-content;">
        <?php
        include '../Views/pokemonDetailView.php';
        ?>
        <a style="padding: 1.5rem 2rem; color: #f1f1f1; background: #b84848" href="http://localhost:8000/src/Views/pokemonIndex.php">Retour au Pokedex</a>
    </div>
<?php
@include_once 'footer.php';
