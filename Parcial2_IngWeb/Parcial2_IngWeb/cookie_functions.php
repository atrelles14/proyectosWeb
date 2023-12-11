<?php
function set_team_cookie($team_id) {
    setcookie('last_team', $team_id, time() + (86400 * 30), "/"); // Cookie válida por 30 días
}

function get_last_team_cookie() {
    return isset($_COOKIE['last_team']) ? $_COOKIE['last_team'] : null;
}

?>
