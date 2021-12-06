<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: login.php');
}

session_destroy();

header('Location: index.php');