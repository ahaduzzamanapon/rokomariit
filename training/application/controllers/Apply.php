<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	public function index()
	{
		$data['cTitle'] = 'About Rokomari IT Institute';
		$this->load->view('include/r_header',$data);
		$this->load->view('apply');
		$this->load->view('include/r_footer');
	}
}
