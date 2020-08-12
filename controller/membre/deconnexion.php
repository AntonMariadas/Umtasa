<?php
$_SESSION = array ();
session_destroy();
header("Location: espace-membre");
exit;