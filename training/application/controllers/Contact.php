<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		// echo base_url(); exit;
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
		
		// $this->data['contact'] = $this->Site_model->get_contact(); 
		// $this->data['meta_title'] = 'Contact Us';
		// $this->data['method'] = 'contact';
		// $this->data['subview'] = 'contact_us';
		// $this->load->view('frontend/_layout_main', $this->data);
		// $this->data['contact'] = $this->Site_model->get_contact(); 
		
		

		$this->data['cTitle'] = 'Contact Rokomari IT Institute';
		$this->load->view('include/r_header',$this->data);
		$this->load->view('contact',$this->data);
		$this->load->view('include/r_footer');
	}


	public function sendemail(){
    

		// $this->data['setting'] = $this->Common_model->get_info('setting');
		// echo $this->session->userdata('captcha_image_text').$this->input->post('captcha_image_submit');
		if($this->session->userdata('captcha_image_text') === $this->input->post('captcha_image_submit'))
		{
			// echo "got it";
			$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'localhost',
			'smtp_port' => 587,
			'smtp_user' => '',
			'smtp_pass' => '',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
			);

			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");

				
				$this->email->from($this->input->post('email'), $this->input->post('name'));
				$this->email->to($this->data['setting']->contact_email);
				$this->email->subject($this->input->post('subject'));
				$this->email->message($this->input->post('message'));
				if($this->email->send())
				{
					$this->session->set_flashdata('error','<div class="alert-alert-danger" style="color:red; display:block">Email Sent Successfully.</div>');
					redirect('contact-us'); 
				}
				else
				{
						$this->session->set_flashdata('error','<div class="alert-alert-danger" style="color:red; display:block">Email Not Sent.</div>');
					redirect('contact-us');
				}

		}
				else
				{
					$this->session->set_flashdata('error','<div class="alert-alert-danger" style="color:red; display:block">Captcha does not Matched</div>');
					redirect('contact-us');
				}
		}



		


	
	
}
