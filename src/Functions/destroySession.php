<?php
$_SESSION = [];
session_destroy();
header('Location: http://localhost:8000/src/Views/pokemonIndex.php');