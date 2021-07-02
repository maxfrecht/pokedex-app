<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
include '../../Models/User.php';
include '../../Models/Pokemon.php';
include_once '../../Models/Team.php';
include_once '../../Services/dataBaseService.php';
include '../teamController.php';
session_start();
if(isset($_POST['email'], $_POST['psw'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'bluesjack', '131249');
        $req = "SELECT * FROM user WHERE email = :email";
        $res = $pdo->prepare($req);
        $res->execute(array(":email" => $_POST['email']));
        $user = $res->fetch(PDO::FETCH_OBJ);
        if(password_verify($_POST['psw'], $user->password)) {
            $_SESSION['user'] = new User(intval($user->id),$user->firstName, $user->lastName, $user->email);
            $date = date_format(new DateTime(), 'Y-m-d');
            $res_update = $pdo->prepare('UPDATE `user` SET last_connected = :date  WHERE id = :id');
            $tongue = $res_update->execute(array(":date" => $date,":id"=> $user->id));
            $_SESSION['team'] = new teamController();
            header('Location: http://localhost/pokedex-app/src/Views/pokemonIndex.php');
        }
    } catch (PDOException $e) { echo $e->getMessage(); }
}