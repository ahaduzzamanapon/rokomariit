<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $this->load->helper('captcha');
		
		$vals = array(
		//'word'          => '',
		'img_path'      => './captcha_images/',
		'img_url'       => './captcha_images/',
		'font_path'     => './path/to/fonts/texb.ttf',
		'img_width'     => '140',
		'img_height'    => 50,
		'expiration'    => 7200,
		'word_length'   => 4,
		'font_size'     => 40,
		'img_id'        => 'Imageid',
		'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
		// White background and border, black text and red grid
		'colors'        => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 255, 255)
		)
	   );
	   
	
	   $cap = create_captcha($vals);
	   $image = $cap['image'];
	   $captcha_image_text = $cap['word'];
	   $this->session->set_userdata('captcha_image_text',$captcha_image_text);
	  
		$this->data['captcha_image'] = $image;

		$this->data['cTitle'] = 'Rokomari IT Institute|Pioneer Outsourcing Training Institute';
		$this->load->view('include/r_header',$this->data);
		$this->load->view('welcome_message',$this->data);
		$this->load->view('include/r_footer');
	}

	
}
