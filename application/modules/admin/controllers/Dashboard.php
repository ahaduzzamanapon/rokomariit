<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;

        $this->load->model('Dashboard_model');
    }

	public function index()
	{
        $this->data['total_product'] = $this->Dashboard_model->get_count('product'); 
        $this->data['total_client'] = $this->Dashboard_model->get_count('client'); 
        $this->data['total_article'] = $this->Dashboard_model->get_count('article'); 
        $this->data['total_event'] = $this->Dashboard_model->get_count('news'); 

		$this->data['meta_title'] = 'Dashboard';
		$this->data['subview'] = 'dashboard/index';
    	$this->load->view('backend/_layout_main', $this->data);
	}

	public function blank(){
		$this->data['page_heading'] = 'Blank Page';
		$this->data['subview'] = 'dashboard/blank';
    	$this->load->view('backend/_layout_main', $this->data);
	}	

}