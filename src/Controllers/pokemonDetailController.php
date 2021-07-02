<?php
include_once '../Services/ApiService.php';
include_once '../Models/Pokemon.php';

class pokemonDetailController
{
    private ?ApiService $pokedex = null;
    private ?Pokemon $pokemon = null;

    public function __construct() {
        $this->pokedex = $_SESSION['indexController']->getApiService();
        if(isset($_GET['order'])) {
            $this->pokemon = $this->pokedex->getPokemonByOrder($_GET['order'], ceil(intval($_GET['order'])/20));
        }
    }

    public function getPokemon():Pokemon {
        return $this->pokemon;
    }
}