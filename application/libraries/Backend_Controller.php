<?php
class Backend_Controller extends MY_Controller
{
	var $MerchantControllerName;

	function __construct ()
	{
		parent::__construct();

		// $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning"> <i class="fa fa-warning"></i> ', '</div>');
		

		// $this->data['site_name'] = 'XYZ Admin Panel';
		// $this->data['website_url'] = 'http://www.domain.com';

		$this->lang->load('auth');
		$this->data['meta_title'] = 'Page Title';			
		$this->data['domain_title'] = 'Site Title';			
	}
}