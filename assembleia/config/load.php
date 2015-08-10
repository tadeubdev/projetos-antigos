<?php

require_once 'define.php';
require_once 'functions.php';

function __autoload($classes){

    if(file_exists(sprintf("class/%s.class.php", $classes))){
        require_once sprintf("class/%s.class.php", $classes);
    }

    if(file_exists(sprintf("../class/%s.class.php", $classes))){
        require_once sprintf("../class/%s.class.php", $classes);
    }

    if(file_exists(sprintf("%s.class.php", $classes))){
        require_once sprintf("%s.class.php", $classes);
    }

}