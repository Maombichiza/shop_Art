<?php
include('connexion.php');
session_start();
$data = array(
    ':to_user_id' => $_POST['to_user_id'],
    ':from_user_id' => $_SESSION['user_id'],
    ':chat_message' => $_POST['chat_message']
);

$query = "INSERT INTO tb_chat_message (to_user_id, from_user_id, chat_message) VALUES 
(:to_user_id, :from_user_id, :chat_message)";
$statement = $conn->prepare($query);
if ($statement->execute($data)) {
    echo load_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);
}