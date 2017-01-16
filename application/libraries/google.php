<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(APPPATH . 'libraries/google-api-php-client/src/Google/service' . PATH_SEPARATOR . get_include_path());
	require_once APPPATH . 'libraries/google-api-php-client/vendor/Autoload.php';

class Google extends Google_Client {
    function __construct($params = array()) {
        parent::__construct();
    }
} 

?>