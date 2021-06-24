<?php
include_once '../Controllers/pokemonIndexController.php';

if(!isset($_SESSION)) {
    $_SESSION['pokemonIndex'] = new pokemonIndexController();
}