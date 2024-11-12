<?php
class Frontend_Controller extends MY_Controller
{
	function __construct ()
	{
		parent::__construct();
		
		// Load stuff
		// $this->load->model('page_m');
		
		// Fetch navigation
		// $this->data['menu'] = $this->page_m->get_nested();
		// $this->data['news_archive_link'] = $this->page_m->get_archive_link();
		
		$this->load->model('Site_model');
		$this->load->model('Common_model');

		$this->data['setting'] = $this->Common_model->get_info('setting');
		$this->data['article_list'] = $this->Site_model->get_data('article');
		$this->data['services'] = $this->Site_model->get_data('services');
		$this->data['social'] = $this->Site_model->get_data('social');
		$this->data['category_list'] = $this->Site_model->get_data('category');
		$this->data['homepage_article'] = $this->Site_model->get_homepage_show('article');
		$this->data['service_footer'] = $this->Site_model->get_footershow('services');
		$this->data['product_footer'] = $this->Site_model->get_footershow('product');
		

		$this->data['address_footer'] = $this->Site_model->get_footer_address_show('contact');

		
		$this->data['meta_title'] = 'Rokomari IT Ltd';
		$this->data['meta_keywords'] = 'Rokomari IT Ltd website, Web Site Design and Development Company, IT Training Cmopany';
        $this->data['meta_description'] = 'Rokomari IT Ltd website, Web Site Design and Development Company, IT Training Cmopany';

        $this->data['contact_email'] = 'info@rokomariit.com';
        $this->data['contact_phone'] = '(+88) 01707776607';
        $this->data['domain_title'] = 'Rokomari IT Ltd';
        $this->data['method'] = '';
	}
}