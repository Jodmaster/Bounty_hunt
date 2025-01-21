<?php
    // save a player's score to a database

    // replace missing name by 'anonymous'
    if (!array_key_exists("name", $_GET) || $_GET["name"] == "") {
        $_GET["name"] = "anonymous";
    }

    // replace missing score by 0
    if (!array_key_exists("score", $_GET) || $_GET["score"] == "") {
        $_GET["score"] = 0;
    }

    // open a connection to the database as a PDO
    require 'get_db_connection.php';
    $conn = get_db_connection();

    // prepared statements help prevent SQL injection attacks
    // if you have to do lots of executions, they're also faster
    $query = $conn ->
    prepare("insert into bounty_hunt_scores (username, score) ".
        "values (:name, :score)");

    // include the values from $_GET in the query
    $query -> bindParam(':name', $_GET['name']);
    $query -> bindParam(':score', intVal($_GET['score'],10));

    $query -> execute();

    // remove all references to the connection
    $query = null;
    $conn = null;

?>