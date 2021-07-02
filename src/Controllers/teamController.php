<?php


class teamController
{
    private dataBaseService $bdd;
    private ?User $user;
    private array $teams = [];

    /**
     * @return array
     */
    public function getTeams(): array
    {
        return $this->teams;
    }

    /**
     * @param array $teams
     */
    public function setTeams(array $teams): void
    {
        $this->teams = $teams;
    }

    public function __construct()
    {
        $this->bdd = new dataBaseService();
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
            $teams = $this->bdd->selectAllTeamByUserId($this->user->getId());
            if (count($teams) > 0) {
                foreach ($teams as $team) {
                    $this->teams[] = new Team($team->nomEquipe, $team->Id_Equipe);
                }
            }
        }

    }

    public function createTeam($name)
    {
        $this->bdd->insertTeamForUser($this->user->getId(), $name);
//        $this->teams[] = new Team($name, $this->bdd->getLastInsertIdTeam());
    }

    public function addPokemonToTeam($idPokemon, $idTeam)
    {
        $this->bdd->insertPokemonIntoTeam($idPokemon, $idTeam);
    }
}