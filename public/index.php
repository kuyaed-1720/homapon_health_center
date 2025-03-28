<?php

require "../app/Core/autoload.php";

session_start();

require "../app/Core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
