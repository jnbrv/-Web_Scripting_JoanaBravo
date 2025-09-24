<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // redirect back to login page
exit();
