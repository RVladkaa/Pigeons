<?php
// undo_delete_pigeon.php

require 'config/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pigeonId = $_POST['pigeonId'];

    // Виконайте логіку для відновлення видаленого голуба в базі даних
    // Наприклад, оновлення статусу голуба на "не видалено"

    $response = array('success' => true, 'message' => 'Pigeon successfully restored.');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Invalid request.');
    echo json_encode($response);
}
?>
