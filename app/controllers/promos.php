<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promos extends CI_Controller {

	public function index()	{
		$this->load->view('promos/coming-soon');
	}
}