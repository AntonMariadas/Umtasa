<?php
session_start();
include('controller/Router.php');
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
Router::route($page);


