<?php 
session_start();
require("Model/RequestBookChapter.php");
$Chapter = getBillets();

require("View/IndexView.php");