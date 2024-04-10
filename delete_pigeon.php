<?php
session_start();
require 'config/init.php';


// Check if the pigeon ID is provided
if (isset($_GET['id'])) {
    $pigeonId = $_GET['id'];

    // Your database connection and query to delete the pigeon
    $db = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = "DELETE FROM pigeons WHERE pigeon_id = :pigeonId";
    $statement = $db->prepare($sql);
    $statement->execute(["pigeonId" => $pigeonId]);

    // Redirect the user after deleting the pigeon
    header("Location: /test.php");

} else {
    // If pigeon ID is not provided, redirect to the pigeons page or another page
    header("Location: /test.php");

}
?>
