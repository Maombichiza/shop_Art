<?php
try {
    $conn = new PDO(
        'mysql:host=localhost; dbname=chat_app; charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

function load_user_last_activity($user_id, $conn)
{
    $query = "SELECT * FROM tb_login_details WHERE ref_user = '$user_id' ORDER BY last_activity DESC LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    foreach ($resultat as $row) {
        return $row['last_activity'];
    }
}

function load_user_chat_history($from_user_id, $to_user_id, $conn)
{
    $query = "SELECT * FROM tb_chat_message WHERE (from_user_id ='" . $from_user_id . "' 
    AND to_user_id ='" . $to_user_id . "') OR (from_user_id='" . $to_user_id . "' 
    AND to_user_id='" . $from_user_id . "') ORDER BY dateamp DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    $output = '<ul class="list-unstyled">';
    foreach ($resultat as $row) {
        $user_name = '';
        if ($row['from_user_id'] == $from_user_id) {
            $user_name = '<b class="text-success">You</b>';
        } else {
            $user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $conn) . '</b>';
        }
        $output .= '
            <li style="border-bottom:1px dotted #ccc;">
                <p>' . $user_name . ' - ' . $row['chat_message'] . '
                    <div align="right">
                        - <small><em>' . $row['dateamp'] . '</em></small>
                    </div>
                </p>
            </li>
        ';
    }
    $output .= '</ul>';
    //$query = 'UPDATE tb_chat_message SET status = 0 WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = 1';
    //$statement = $conn->prepare($query);
    //$statement->execute();
    return $output;
}

function get_user_name($user_id, $conn)
{
    $query = "SELECT username FROM tb_login WHERE user_idd ='$user_id'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    foreach ($resultat as $row) {
        return $row['username'];
    }
}

//Messages non lit
function count_message_non_lit($from_user_id, $to_user_id, $conn)
{
    $query = "SELECT * FROM tb_chat_message WHERE from_user_id ='$from_user_id' AND to_user_id ='$to_user_id'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $output = '';
    if ($count > 0) {
        $output = '<span class="label label-success">' . $count . '</span>';
    }
    return $output;
}