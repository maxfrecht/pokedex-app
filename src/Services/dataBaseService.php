<?php

class dataBaseService
{
    private PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'bluesjack', '131249');
    }

//    public function insertPokemons(array $pokemons):void {
//        foreach ($pokemons as $pokemon) {
//            try {
//                $query = 'INSERT INTO `Pokemon`(`idAPI`) VALUES (:id)';
//                $res = $this->pdo->prepare($query);
//                $res->execute(array(":id"=>$pokemon->id));
//            } catch (PDOException $e) {
//                echo $e->getMessage();
//            }
//        }
//    }

    public function selectPokemonById(int $id): Pokemon | string {
        try {
            $query = 'SELECT * FROM Pokemon WHERE id = :id';
            $res = $this->pdo->prepare($query);
            $res->execute(array(":id"=> $id));
            return $res->fetch(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            return $e->getMessage();
        }

}

    public function insertTeamForUser($user_id, $team_name) {
        try {
            $query = 'INSERT INTO Equipe (`nomEquipe`, `Id_Utilisateur`) VALUES (:name, :user_id)';
            $res = $this->pdo->prepare($query);
            $res->execute(array(":name"=>$team_name,":user_id"=>$user_id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertPokemonIntoTeam($id_pokemon, $id_team) {
        try {
            $query = 'INSERT INTO Pokemon (`IdAPI`, `Id_Equipe`) VALUES (:api,:team)';
            $res = $this->pdo->prepare($query);
            $res->execute(array(":api"=>$id_pokemon, ":team" => $id_team));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectAllTeamByUserId($user_id): array | string {
        try {
            $query = "SELECT * FROM Equipe WHERE Id_Utilisateur = :user_id";
            $res = $this->pdo->prepare($query);
            $res->execute(array(":user_id" => $user_id));
            return $res->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteTeamById($id_team) {
        try {
            $query = "DELETE FROM Equipe WHERE Id_Equipe = :id";
            $res = $this->pdo->prepare($query);
            $res->execute(array(":id"=> $id_team));
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deletePokemonInTeam($id_team, $id_pokemon) {
        try {
            $query = "DELETE FROM Pokemon WHERE Id_Equipe = :id_team AND Id_Pokemon = :id_pokemon";
            $res = $this->pdo->prepare($query);
            $res->execute(array(":id_team"=>$id_team, ":id_pokemon"=>$id_pokemon));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}