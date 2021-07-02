<?php
include_once '../Services/ApiService.php';

class pokemonIndexController
{
    private ApiService $apiService;
    private int $page = 1;
    private int $maxPage = 75;
    private array $visited = [];

    public function __construct()
    {
        $this->apiService = ApiService::getInstance();
    }

    public function getPokemons(): array
    {
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
            if (!in_array($page, $this->visited)) {
                $this->apiService->getPokemonDetailsByPage($page);
            }
            $this->page = $page;
        }
        $pokemons = $this->apiService->getPokemons();

        $this->visited[] = $page;

        return $pokemons[$this->page];
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

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getMaxPage(): int
    {
        return $this->maxPage;
    }
}