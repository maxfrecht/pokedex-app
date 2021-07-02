<?php
include_once '../Models/Pokemon.php';
include_once '../Models/Abilities.php';
include_once '../Functions/dump.php';

class ApiService
{
    private array $pokemons;
    private array $pokemonsByName;

    /**
     * @return array
     */
    public function getPokemonsByName(): array
    {
        return $this->pokemonsByName;
    }

    /**
     * @param array $pokemonsByName
     */
    public function setPokemonsByName(array $pokemonsByName): void
    {
        $this->pokemonsByName = $pokemonsByName;
    }

    private static ?ApiService $apiService = null;

    public static function getInstance()
    {
        if (self::$apiService == null) {
            self::$apiService = new ApiService();
        }
        return self::$apiService;
    }

    public function getPokemonByOrder($order, $page): Pokemon | null
    {
        foreach ($this->pokemons[$page] as $pokemon) {
            if ($pokemon->getOrder() === intval($order)) {
                return $pokemon;
            }
        }
        return null;
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

    public function __construct()
    {
        $this->getPokemonsDetails();
        $this->createArrayByName();
    }

    public function getPokemonDetailsByPage($page): array {
        $this->getPokemonsDetails(($page - 1) * 20);
        return $this->pokemons;
    }

    public function createArrayByName() {
        $listFile = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=900';
        $data = file_get_contents($listFile);
        $pokemonList = json_decode($data);

        foreach ($pokemonList->results as $pokemon) {
            $this->pokemonsByName[$pokemon->url] = $pokemon->name;
        }
    }

    public function getPokemonByName($name) {

        $file = array_search($name, $this->pokemonsByName);
        $data = file_get_contents($file);
        $pokemonDetails = json_decode($data);
        $types = [];
        foreach ($pokemonDetails->types as $type) {
            $types[] = $type->type->name;
        }
        $baseStats = [];
        foreach ($pokemonDetails->stats as $stat) {
            $baseStats[$stat->stat->name] = $stat->base_stat;
        }
        $abilities = [];
        foreach ($pokemonDetails->abilities as $ability) {

            $ability_name = $ability->ability->name;
            $is_hidden = $ability->is_hidden;
            $urlAbility = $ability->ability->url;
            $abilityData = file_get_contents($urlAbility);
            $abilityDetail = json_decode($abilityData);
            $effect ='';
            foreach($abilityDetail->effect_entries as $ef) {
                if($ef->language->name === 'en') {
                    $effect = $ef->effect;
                }
            }
            $ability = new Abilities($ability_name, $is_hidden, $effect);
            $abilities[] = $ability;
        }

        $pokemon = new Pokemon(
            $pokemonDetails->name,
            $pokemonDetails->sprites->front_default,
            $pokemonDetails->sprites->other->dream_world->front_default,
            $pokemonDetails->id,
            $types,
            $baseStats,
            $abilities
        );
        $page = ceil($pokemonDetails->id / 20);
        $this->pokemons[$page][] = $pokemon;

        return $pokemon;
    }

    public function getPokemonsDetails($offset = 0,$limit = 20): void
    {
        $listFile = 'https://pokeapi.co/api/v2/pokemon/?offset='. $offset .'&limit=' . $limit;
        $data = file_get_contents($listFile);
        $pokemonList = json_decode($data);
        $tmpArray = [];
        foreach ($pokemonList->results as $simplePokemon) {
            $file = $simplePokemon->url;
            $pokemonData = file_get_contents($file);
            $pokemonDetails = json_decode($pokemonData);
            $types = [];
            foreach ($pokemonDetails->types as $type) {
                $types[] = $type->type->name;
            }
            $baseStats = [];
            foreach ($pokemonDetails->stats as $stat) {
                $baseStats[$stat->stat->name] = $stat->base_stat;
            }
            $abilities = [];
            foreach ($pokemonDetails->abilities as $ability) {

                $ability_name = $ability->ability->name;
                $is_hidden = $ability->is_hidden;
                $urlAbility = $ability->ability->url;
                $abilityData = file_get_contents($urlAbility);
                $abilityDetail = json_decode($abilityData);
                $effect ='';
                foreach($abilityDetail->effect_entries as $ef) {
                    if($ef->language->name === 'en') {
                        $effect = $ef->effect;
                    }
                }
                $ability = new Abilities($ability_name, $is_hidden, $effect);
                $abilities[] = $ability;
            }

            $pokemon = new Pokemon(
                $pokemonDetails->name,
                $pokemonDetails->sprites->front_default,
                $pokemonDetails->sprites->other->dream_world->front_default,
                $pokemonDetails->id,
                $types,
                $baseStats,
                $abilities
            );
            $tmpArray[] = $pokemon;
        }

        $this->pokemons[(($offset / 20) + 1)] = $tmpArray;
    }
}