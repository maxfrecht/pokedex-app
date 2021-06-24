<?php
include_once 'header.php';
include '../Controllers/getIndexController.php';

?>
<div class="container">
    <?php
    /** @var pokemonIndexController $indexController */
    $indexController->displayPokemonList(); ?>
</div>
<?php
include_once 'footer.php';


