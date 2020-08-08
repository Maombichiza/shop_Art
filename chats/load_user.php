<?php
include('connexion.php');
session_start();
$query = "SELECT * FROM tb_login WHERE user_idd != '" . $_SESSION["user_id"] . "'";
$statement = $conn->prepare($query);
$statement->execute();
$resulat = $statement->fetchAll();

$output = '
    <table class="table table-bordered table-striped">     
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
        </tr>    
';

foreach ($resulat as $row) {
    $status = '';
    $current_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
    $current_time = date('Y-m-d H:i:s', $current_time);
    $user_lastActivity = load_user_last_activity($row['user_idd'], $conn);
    if ($user_lastActivity > $current_time) {
        $status = '<span class="label label-success">Online</span>';
    } else {
        $status = '<span class="label label-danger">Offline</span>';
    }
    $output .= '
        <tr>
            <td> ' . $row['username'] . '</td>
            <td> ' . $status . ' </td>
            <td> 
                <button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['user_idd'] . '" 
                data-tousername="' . $row['username'] . '">Sart Chat</button>
            </td>
        </tr>
    ';
}
$output .= '</table>';
echo $output;