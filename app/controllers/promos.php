<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promos extends CI_Controller {

	public function index() {
		$this->coming_soon();
	}

	/**	Initial launch page to garner interest
	  * Focuses on Alamo Ranch and tries to get Email Address
    **/
	public function coming_soon() {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<li>', '</li>');

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'email address', 'trim|required|valid_email');

		if ($this->form_validation->run()) {
			redirect('estimate');
			return;
		}


		$this->load->view('promos/coming-soon');
	}
}