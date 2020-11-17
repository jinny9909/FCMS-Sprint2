<?php 
    session_start();

    session_unset();
    session_destroy();

    header("Location: http://foodedge-asia.rf.gd/index.php");
?>