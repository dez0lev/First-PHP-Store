<?php

session_start();

require_once ('helper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    logout();
}

redirect('../index.php');


