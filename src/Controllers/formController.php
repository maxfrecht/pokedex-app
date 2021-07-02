<?php

include_once '../Services/ApiService.php';
include_once '../Models/Pokemon.php';
include_once '../Functions/dump.php';

class FormController
{

    private ApiService $apiService;

    public function __construct()
    {
        $this->apiService = $_SESSION['indexController']->getApiService();
    }

    /**
     * @return ApiService
     */
    public function getApiService(): ApiService
    {
        return $this->apiService;
    }

    /**
     * @param ApiService $apiService
     */
    public function setApiService(ApiService $apiService): void
    {
        $this->apiService = $apiService;
    }

    public function getOrderByName(string $name):int
    {
        foreach ($this->apiService->getPokemons() as $pokemonList) {
            foreach ($pokemonList as $pokemon) {
                if (strtolower($name) === $pokemon->getName()) {
                    return $pokemon->getOrder();
                }
            }
        }
        $pokemon = $this->apiService->getPokemonByName(strtolower($name));
        return $pokemon->getOrder();
    }
}