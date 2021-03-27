<?php

// llamando a config
require_once 'config/config.php';

// llamando a url helperl
require_once 'helpers/url_help.php';

// llamando a libs
spl_autoload_register(function($files){
    require_once 'libs/' . $files . '.php';
});