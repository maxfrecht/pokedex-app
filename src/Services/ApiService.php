<?php
include_once '../Models/Pokemon.php';
include_once '../Functions/dump.php';
class ApiService
{
    private array $pokemons;

    private static ?ApiService $apiService = null;

    public static function getInstance() {
        if (self::$apiService == null) {
            self::$apiService = new ApiService();
        }
        return self::$apiService;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param array $pokemons
     */
    public function setPokemons(array $pokemons): void
    {
        $this->pokemons = $pokemons;
    }

    public function __construct() {
        $this->getPokemonsDetails();
    }

    public function getPokemonsDetails(): void
    {
        $listFile = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=30';
        $data = file_get_contents($listFile);
        $pokemonList = json_decode($data);
        foreach ($pokemonList->results as $simplePokemon) {
            $file = $simplePokemon->url;
            $pokemonData = file_get_contents($file);
            $pokemonDetails = json_decode($pokemonData);
            $types = [];
            foreach ($pokemonDetails->types as $type) {
                $types[] = $type->type->name;
            }
            $pokemon = new Pokemon(
                $pokemonDetails->name,
                $pokemonDetails->sprites->front_default,
                $pokemonDetails->sprites->other->{'official-artwork'}->front_default,
                $pokemonDetails->order,
                $types
            );
            $this->pokemons[] = $pokemon;
        }
    }
}