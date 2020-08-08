<?php
include('connexion.php');
session_start();

echo load_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);