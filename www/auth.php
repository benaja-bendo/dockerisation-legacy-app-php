<?php
    ob_start(); // Commence la mise en tampon de sortie
    if (isset($_POST['US_login']) and isset($_POST['US_password'])) {
        session_start();
        include 'connect.php';

        ini_set('display_errors', '1');

        $US_login = pg_escape_string($link,$_POST['US_login']);
        $US_password = pg_escape_string($link,$_POST['US_password']);

        $sql = "SELECT * FROM utilisateurs WHERE US_login = '$US_login' AND US_password = crypt('$US_password', gen_salt('bf'))";
        $res = pg_query($link,$sql);
        if ($res != false) {
            if (pg_num_rows($res) > 0) {
                // Utilisateur trouvé dans la base
                $utilisateur = pg_fetch_assoc($res);
                $_SESSION['login'] = $utilisateur['US_login'];
                header("Location: home.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            header("Location: BADUSER.html");
            exit;
        }
    }
    ob_end_flush(); // Envoie le contenu du tampon de sortie et éteint la mise en tampon de sortie
?>