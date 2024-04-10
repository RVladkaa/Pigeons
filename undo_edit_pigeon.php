<?php
// undo_edit_pigeon.php

require 'config/init.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the pigeon ID is provided
    if (isset($_POST['pigeonId'])) {
        $pigeonId = $_POST['pigeonId'];

        try {
            // Your database connection
            $db = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Retrieve the original pigeon data
            $sql = "SELECT * FROM pigeons WHERE pigeon_id = :pigeonId";
            $statement = $db->prepare($sql);
            $statement->execute(['pigeonId' => $pigeonId]);
            $originalPigeon = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$originalPigeon) {
                throw new InvalidArgumentException('Pigeon not found.');
            }


            // echo '<script>';
            // echo 'console.log(' . json_encode($originalPigeon) . ');';
            // echo '</script>';


            // Restore pigeon changes
            $sql = "UPDATE pigeons 
                    SET 
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
                    WHERE pigeon_id = :pigeonId";

            $statement = $db->prepare($sql);
            $statement->execute([
                'number' => $originalPigeon['number'],
                'name' => $originalPigeon['name'],
                'sex' => $originalPigeon['gender'],
                'color' => $originalPigeon['color'],
                'owner' => $originalPigeon['owner'],
                'birth_date' => $originalPigeon['birth_date'],
                'death_date' => $originalPigeon['death_date'],
                'descendant_id' => $originalPigeon['descendant_id'],
                'paired_id' => $originalPigeon['paired_id'],
                'additional_info' => $originalPigeon['additional_info'],
                'pigeonId' => $pigeonId,
            ]);

            $response = array('success' => true, 'message' => 'Pigeon changes successfully restored.');
            echo json_encode($response);

        } catch (PDOException $e) {
            // Log errors or output them to the client side
            $response = array('success' => false, 'message' => 'Error restoring pigeon changes: ' . $e->getMessage());
            echo json_encode($response);

        } catch (InvalidArgumentException $e) {
            // Respond to missing required data
            $response = array('success' => false, 'message' => $e->getMessage());
            echo json_encode($response);
        }

    } else {
        // Respond to missing pigeon ID
        $response = array('success' => false, 'message' => 'Pigeon ID not provided.');
        echo json_encode($response);
    }

} else {
    // Respond to invalid request type
    $response = array('success' => false, 'message' => 'Invalid request.');
    echo json_encode($response);
}
?>
