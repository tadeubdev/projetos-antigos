<?php

switch ($_SERVER['SERVER_NAME']) {
    case 'localhost':
        define("HOST_NAME","localhost");
        define("HOST_USER","root");
        define("HOST_PASS","");
        define("HOST_DB","maxbody");

        define("URL", 'http://localhost/antigos/lh-suplementos/' );
    break;
    
    default:
        # default values;
    break;
}

?>