<?php

extract($_POST);

setcookie('cor', $cor, time() + (30 * 24 * 3600));

?>