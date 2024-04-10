<?php
session_start();
require 'config/init.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the pigeon ID is provided
    if (isset($_POST['pigeon_id'])) {
        $pigeonId = $_POST['pigeon_id'];

        try {
            // Your database connection
            $db = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Your update query
            $sql = "UPDATE pigeons SET 
                    number = :number, 
                    name = :name, 
                    gender = :sex, 
                    color = :color, 
                    owner = :owner, 
                    birth_date = :birth_date, 
                    death_date = :death_date, 
                    descendant_id = :descendant_id, 
                    paired_id = :paired_id, 
                    additional_info = :additional_info 
                    WHERE pigeon_id = :pigeon_id";

            // Prepare and execute the query
            $statement = $db->prepare($sql);
            $statement->execute([
                'number' => $_POST['number'],
                'name' => $_POST['name'],
                'sex' => $_POST['sex'],
                'color' => $_POST['color'],
                'owner' => $_POST['owner'],
                'birth_date' => $_POST['birth_date'],
                'death_date' => !empty($_POST['death_date']) ? $_POST['death_date'] : null,
                'descendant_id' => !empty($_POST['descendant_id']) ? $_POST['descendant_id'] : null,
                'paired_id' => !empty($_POST['paired_id']) ? $_POST['paired_id'] : null,
                'additional_info' => $_POST['additional_info'],
                'pigeon_id' => $pigeonId,
            ]);

            // Add a success message or redirect to another page
            echo "Pigeon updated successfully!";
            // Or redirect to another page
            // header("Location: /success.php");

        } catch (PDOException $e) {
            // Handle the exception (display an error message or log it)
            echo "Error updating pigeon: " . $e->getMessage();
        }

    } else {
        // If pigeon ID is not provided, handle the error (display a message or redirect)
        echo "Missing required parameter 'pigeon_id'.";
    }
} else {
    // If the request method is not POST, handle the error (display a message or redirect)
    echo "Invalid request method.";
}
?>
