<?php
include 'session_functions.php';
include 'cookie_functions.php';
include 'db_functions.php';

if (!is_authenticated()) {
    header('Location: index.php');
    exit();
}

$last_team = get_last_team_cookie();

$team_id = filter_input(INPUT_GET, 'team_id', FILTER_VALIDATE_INT);
if (!$team_id) {

    exit('ID de equipo no válido');
}

$team_details = get_team_details($team_id);

?>


