<?php

include 'config.php';
$config = new Config;

$action = $_GET['action'] ?? NULL;

switch ($action) {
  case 'get_team':
    echo $config->getTeam() ? true : false;
    break;
  case 'delete_team':
    echo $config->deleteTeam($_POST['id']) ? true : false;
    break;

  case 'edit_team_point':
    echo $config->editTeamPoint($_POST) ? true : false;
    break;

  default:
    # code...
    break;
}
