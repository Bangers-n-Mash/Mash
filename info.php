<?php
$php_inipath = php_ini_loaded_file();

if ($php_inipath) {
    echo 'Loaded php.ini is: ' . $php_inipath;
} else {
    echo 'A php.ini file is not loaded';
}
