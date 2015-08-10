<?php

function escape($str){ return Banco::$conn->real_escape_string($str); }