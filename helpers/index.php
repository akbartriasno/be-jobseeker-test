<?php

require 'responses.php';
require 'datatables.php';

function clean($string = null) {
    return ($string) ? strip_tags($string) : '';
}