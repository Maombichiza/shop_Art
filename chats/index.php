<!DOCTYPE html>
<?php
include('connexion.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/css/all.css">
    <link rel="stylesheet" href="bootstrap/js/jquery-ui.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Test</h1>
            <div class="col-md-7">
                <div class="table-responsive">
                    <h4 align="center">Utilisateurs en ligne</h4>
                    <p align="right"> Salut <?php echo $_SESSION['user_name']; ?> - <a href="logout.php"
                            class="btn btn-danger btn-xs">Logout</a> </p>
                    <div id="user_details"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 id="user_chat"></h4>
                    </div>
                    <div class="panel-body">
                        <div id="user_model_details"> </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script src="bootstrap/js/jquery-2.2.4.min.js"></script>
    <script src="bootstrap/js/jquery-ui.js"></script>

    <script>
    $(function() {
        load_user();

        setInterval(function() {
            last_activity();
            load_user();
            update_chat_history();
        }, 5000)

        function load_user() {
            $.ajax({
                url: 'load_user.php',
                method: 'POST',
                success: function(data) {
                    $('#user_details').html(data);
                }
            });
        }

        function last_activity() {
            $.ajax({
                url: 'last_activity.php',
                success: function() {

                }
            });
        }

        function chat_dialog_box(to_user_id, to_user_name) {
            $('#user_chat').html("You have chat with " + to_user_name);
            var modal_content = '<div id="user_dialog_' + to_user_id +
                '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content +=
                '<div style="height:400px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' +
                to_user_id + '" id="chat_history_' + to_user_id + '">';

            modal_content += chat_real_time(to_user_id);

            modal_content += '</div>';
            modal_content += '<div class="form-goup">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id +
                '" class="form-control"></textarea>';
            modal_content += '</div><br>';
            modal_content +=
                '<div class="form-group" align="right"><button type="button" name="send_chat" id="' +
                to_user_id +
                '"class="btn btn-info send_chat">Envoyer</button></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            chat_dialog_box(to_user_id, to_user_name);
            $('#user_dialog_'.to_user_id).dialog({
                autoOpen: false,
                width: 400
            });

            $('#user_dialog_' + to_user_id).dialog('open');
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $('#chat_message_' + to_user_id).val();
            $.ajax({
                url: 'insert_chat.php',
                method: 'POST',
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $('#chat_message_' + to_user_id).val('');
                    $('#chat_history_' + to_user_id).html(data);
                }
            });
        });

        function chat_real_time(to_user_id) {
            $.ajax({
                url: 'chat_real_time.php',
                method: 'POST',
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            });

        }

        function update_chat_history() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                chat_real_time(to_user_id);
            });
        }
    });
    </script>
</body>

</html>