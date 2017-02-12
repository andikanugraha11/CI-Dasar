<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class cobaRouting extends CI_Controller
{
	

	public function test($attr=null){
		echo "Asli :<br/>";
		echo base_url()."cobaRouting/test/$attr";
		echo "<br/><br/>";

		$class = $this->uri->segment(1);
		$method = $this->uri->segment(2);
		$attr = $this->uri->segment(3);

		echo "Routing :<br/>";
		echo base_url()."$class/$method/$attr";

	}
}