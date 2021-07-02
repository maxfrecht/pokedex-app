<?php
include_once 'getIndexController.php';
include_once 'formController.php';
$formControl = new FormController();
if(isset($_GET['name'])) {
    $order = $formControl->getOrderByName($_GET['name']);
    header('Location: http://localhost/pokedex-app/src/Views/pokemonDetail.php?order=' . $order);
}