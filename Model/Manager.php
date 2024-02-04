<?php

include("./config/parametre.php");
class Manager
{
    function forgotPasswordDb($table, $email, $token)
    {
        require 'vendor/autoload.php';
    
        $connexion = $this->connexion();
        $sql = "select * from $table where email=?";
        $requete = $connexion->prepare($sql);
        $requete->execute([$email]);
        $client = $requete->fetch(PDO::FETCH_ASSOC);
        if ($client) {
            // Save the token in the database, associated with the user's email
            // You'll need to implement this according to your database setup
            $sql = "UPDATE $table SET reset_token = ? WHERE email = ?";
            $requete = $connexion->prepare($sql);
            $requete->execute([$token, $email]);
    
            // Create a new PHPMailer instance
            $mail = new PHPMailer\PHPMailer\PHPMailer();
    
            // Set up the SMTP properties
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com'; // Replace your SMTP username
            $mail->Password = 'secret'; // Replace with your SMTP password
    
            // Set the email properties
            $mail->setFrom('from@example.com', 'Your Website'); // Replace with your "from" email and name
            $mail->addAddress($email);
            $mail->Subject = 'Password Reset';
            $resetLink = "http://yourwebsite.com/resetpassword.php?token=$token"; // Replace with your reset password URL
            $mail->Body = "Click this link to reset your password: $resetLink";
    
            // Send the email
            if (!$mail->send()) {
                $message = "<p class='text-danger text-center'>Mailer Error: " . $mail->ErrorInfo . "</p>";
            } else {
                $message = "<p class='text-success text-center'>Un email vous a été envoyé</p>";
            }
        } else {
            $message = "<p class='text-danger text-center'>Cet email n'existe pas</p>";
        }
        return $message;
    }

    function searchTable($table, $mot)
    {
        $connexion = $this->connexion();
        $sql = "select * from $table where nom like ? or prenom like ? or email like ?";
        $requete = $connexion->prepare($sql);
        $requete->execute(["%$mot%", "%$mot%", "%$mot%"]);
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    function modifierDb($table, $data)
    {
        extract($data);
        $condition = "";
        $values = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($data  as  $key => $value) {
                if ($key == 'mot_de_passe') {
                    $value = password_hash($value, PASSWORD_DEFAULT);
                }
                if ($key == 'id_role' && is_array($value)) {
                    $value = implode(',', $value);
                }
                if ($key != 'id_client') {
                    if ($condition == "") {
                        $condition .= "$key=?";
                    } else {
                        $condition .= ",$key=?";
                    }
                    $values[] = $value;
                }
            }
            $connexion = $this->connexion();
            $values[] = $id_client;
            $sql = "update $table set $condition where id_client =?";
            $requete = $connexion->prepare($sql);
            $requete->execute($values);
        }
    }

    function insert($table, $data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            extract($data);
            $values = [];
            $pi = "";
            $column = "";
            foreach ($data as $key => $value) {
                if ($key != 'id_client') {
                    if ($key == 'mot_de_passe') {
                        $value = password_hash($value, PASSWORD_DEFAULT); // Hash $value, not $mot_de_passe
                    }
                    if ($key == 'id_role' && is_array($value)) {
                        $value = implode(',', $value);
                    }
                    if ($column == "") {
                        $column .= "$key";
                        $pi .= "?";
                    } else {
                        $column .= ",$key";
                        $pi .= ",?";
                    }
                    $values[] = $value;
                }
            }
            $connexion = $this->connexion();
            $sql = "insert into $table($column) values($pi)";
            // MyFct::prints($sql);die;
            $requete = $connexion->prepare($sql);
            $requete->execute($values); // Pass $values directly, not [$values]
        }
    }
    function registerDb($table, $data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($data);
            $column = "";
            $pi = "";
            $values = [];
            $baseMessage = "<h6 class='text-danger text-center'>";
            $message = "";
            $connexion = $this->connexion();
            foreach ($data as $key => $value) {
                if ($key == 'mot_de_passe') {
                    $value = password_hash($value, PASSWORD_DEFAULT);
                }
                if ($column == "") {
                    $column .= "$key";
                    $pi .= "?";
                } else {
                    $column .= ",$key";
                    $pi .= ",?";
                }
                $values[] = $value;
            }
            // Verify if the client already exists in the database
            $sql = "SELECT * FROM Client WHERE email = ?";
            $requete = $connexion->prepare($sql);
            $requete->execute([$email]);
            $client = $requete->fetch(PDO::FETCH_ASSOC);
            if ($client) {
                $message = $baseMessage .= "Cet email existe déjà</h6>";
            } else {
                $sql = "INSERT INTO $table($column) VALUES($pi)";
                $requete = $connexion->prepare($sql);
                $requete->execute($values);
                $message = "<p class='text-success text-center'>Vous avez créé votre compte</p>";
            }
            return $message;
        }
    }



    function loginDb($table, $data)
    {
        extract($data);
        $baseMessage = "<h6 class='text-danger text-center'>";
        $message = "";
        // $this->prints($data);die;
        //select * from Client where email =? and password = ?;
        //? Ici, nous devons vérifier si l'utilisateur est dans la base de données.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $connexion = $this->connexion();
            $sql = "SELECT * FROM Client WHERE email=?";
            $requete = $connexion->prepare($sql);
            $requete->execute([$email]);
            $client = $requete->fetch(PDO::FETCH_ASSOC);
            if ($client && password_verify($mot_de_passe, $client['mot_de_passe'])) {
                $_SESSION['nom'] = $client['nom'];
                $_SESSION['prenom'] = $client['prenom'];
                $_SESSION['id'] = $client['id_client'];
                $_SESSION['id_role'] = $client['id_role']; // important car c'est de la que nous donnerons les autorisations
                header('location:accueil');
            } else {
                $message = $baseMessage .= "Votre nom ou mot de passe est incorrect";
            }
            return $message;
        }
    }


    function showById($table, $id)
    {
        $connexion  = $this->connexion();
        $sql = "select * from $table where id_client=?";
        $requete = $connexion->prepare($sql);
        $requete->execute([$id]);
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function connexion($host = HOST, $user = USER, $dbname = DBNAME, $password = PASS)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        try {
            $connexion = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            echo "<h1>Désolé, pas de connexion</h1>"; // Added closing curly brace
        }
        return $connexion;
    }
    function listTable($table)
    {
        $connexion = $this->connexion();
        $sql = "select * from $table";
        $requete = $connexion->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    function deleteId($table, $id)
    {
        $connexion = $this->connexion();
        $sql = "delete from $table where id_client=?";
        $requete = $connexion->prepare($sql);
        $requete->execute([$id]);
    }
}
