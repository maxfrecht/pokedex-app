<?php
include_once '../Controllers/pokemonIndexController.php';
session_start();
if(!isset($_SESSION['indexController'])) {
    $_SESSION['indexController'] = new pokemonIndexController();
}
