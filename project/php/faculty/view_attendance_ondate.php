<?php

require '../connection.php';
session_start();
//fetching content from javascript
$recevied = file_get_contents("php://input");
$data = json_decode($recevied);
