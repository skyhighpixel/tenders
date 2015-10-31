<?php
session_start();
if (session_status() != PHP_SESSION_NONE) {
    session_destroy();
}
header('Location: /');
