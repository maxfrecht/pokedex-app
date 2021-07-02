<?php
class Team
{

    private string $name;
    private int $id_user;
    private int $id_team;


    /**
     * Team constructor.
     * @param string $name
     * @param int $id_team
     */
    public function __construct(string $name, int $id_team)
    {
        $this->name = $name;
        $this->id_team = $id_team;
        $this->id_user = $_SESSION['user']->id;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_team
     */
    public function setIdTeam(int $id_team): void
    {
        $this->id_team = $id_team;
    }

    /**
     * @return int
     */
    public function getIdTeam(): int
    {
        return $this->id_team;
    }

}