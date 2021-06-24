<?php
include_once '../Services/ApiService.php';
class pokemonIndexController {
    private ApiService $apiService;

    public function __construct() {
        $this->apiService = ApiService::getInstance();
    }

    public function displayPokemonList():void {
        echo '<ul class="pokemon-list">';
        foreach ($this->apiService->getPokemons() as $pokemon) {
            include '../Views/pokemonIndexListItem.php';
        }
        echo '</ul>';
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
}