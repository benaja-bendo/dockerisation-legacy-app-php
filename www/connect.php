<?php
    $host = "db";
    $username = "postgres";
    $password = "root";
    $db = "gestion_produits";

    $link = pg_connect("host=$host dbname=$db user=$username password=$password") or die ("Erreur de connexion à la base de données.");
    pg_set_client_encoding($link, "utf8");
?>