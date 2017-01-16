<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	require_once APPPATH . 'libraries/facebook/vendor/Facebook/graph-sdk/src/facebook/facebook.php';

class FacebookAuth extends Facebook {
    function __construct($params = array()) {
        parent::__construct();
    }
} 

?>