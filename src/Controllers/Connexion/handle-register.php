<?php

if(isset($_POST['firstName'], $_POST['lastName'],$_POST['email'],$_POST['psw'])) {
    try {
        $date = date_format(new DateTime(), 'Y-m-d');
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'bluesjack', '131249');
        $query = 'INSERT INTO `user`(`firstName`, `lastName`, `email`, `password`, `created_at`, `last_connected`) VALUES (:fn,:ln,:email,:psw,:created,:last)';
        $result = $pdo->prepare($query);
        $result->execute(array(":fn" => $_POST['firstName'], ":ln" => $_POST['lastName'],":email" => $_POST['email'], ":psw" => password_hash($_POST['psw'], PASSWORD_DEFAULT), ":created" => $date, ":last" =>  $date));
        header('Location: http://localhost/pokedex-app/src/Views/?registered=true');
    } catch (PDOException $e) {
        echo $e->getMessage();
//        header('Location: http://localhost/pokedex-app/src/Views/?registered=false');
    }
}