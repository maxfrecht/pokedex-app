<?php
include_once '../Models/Pokemon.php';

class ApiService
{
    private array $pokemons;

    public function __construct() {
        $this->getPokemons();
    }

    public function getPokemons(): array
    {
        $listFile = 'https://pokeapi.co/api/v2/pokemon';
        $data = file_get_contents($listFile);
        $pokemonList = json_decode($data)["results"];
        foreach ($pokemonList as $simplePokemon) {
            $file = $simplePokemon['url'];
            $pokemonData = file_get_contents($file);
            $pokemonDetails = json_decode($pokemonData);
            $types = [];
            foreach ($pokemonDetails['types'] as $type) {
                $types[] = $type['type']['name'];
            }
            $pokemon = new Pokemon(
                $pokemonDetails['name'],
                $pokemonDetails['sprites']['front_default'],
                $pokemonDetails['sprites']['other']['official-artwork']['front_default'],
                $pokemonDetails['order'],
                $types
            );
            $this->pokemons[] = $pokemon;
        }
    }
}