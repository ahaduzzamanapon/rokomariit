<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Frontend_Controller {

	function __construct (){
		parent::__construct();
        $this->load->model('Site_model');
        $this->load->model('Common_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning"> <i class="fa fa-warning"></i> ', '</div>');
	}

	public function index()
	{
        // exit('hello');
        $this->load->helper('captcha');
        $vals = array(
        //'word'          => '',
        'img_path'      => './captcha_images/',
        'img_url'       => base_url().'/captcha_images/',
        'font_path'     => './path/to/fonts/texb.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 4,
        'font_size'     => 16,
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




        // echo 'hello'; exit;
		//dump('Frontend Controller');
        $this->data['slider'] = $this->Site_model->get_slider();
        $this->data['homepage_article'] = $this->Site_model->get_homepage_show('article');
        $this->data['homepage_product'] = $this->Site_model->get_homepage_show('product');
        $this->data['homepage_services'] = $this->Site_model->get_homepage_show('services');
        $this->data['homepage_news'] = $this->Site_model->get_news('news');
        $this->data['concern'] = $this->Site_model->get_concern();
        $this->data['gallery_category'] = $this->Site_model->get_category('gallery_category');
        $this->data['homepage_gallery'] = $this->Site_model->get_homepage_show('gallery');
        $this->data['homepage_client'] = $this->Site_model->get_clicen('client');
        $this->data['testimonial'] = $this->Site_model->get_testimonial();
        
        //view
		$this->data['meta_title'] = 'Home';
        $this->data['method'] = 'home';
		$this->data['subview'] = 'index';
    	$this->load->view('frontend/_layout_main', $this->data);
	}


    public function services($slug){   

        if (!$this->Site_model->service_exists($slug)) { 
            $this->err404();
        }else{            
            // echo 'hello'; exit;
            $this->data['info'] = $this->Site_model->get_info_by_slug_of_services($slug);        
        }    

        $this->data['meta_keywords'] = $this->data['info']->meta_keys;
        $this->data['meta_description'] = $this->data['info']->short_desc;

        $this->data['meta_title'] = $this->data['info']->name;;
        $this->data['method'] = 'service';        
        $this->data['subview'] = 'services';
        $this->load->view('frontend/_layout_main', $this->data);
    } 

    public function events(){   
        $this->data['events_data'] = $this->Site_model->get_data('news'); 

        $this->data['meta_title'] = 'Events';
        $this->data['method'] = 'events';        
        $this->data['subview'] = 'events';
        $this->load->view('frontend/_layout_main', $this->data);
    } 
    public function apply(){   
        redirect(base_url().'training/apply');
    } 


	public function article($slug){

        if (!$this->Site_model->slug_exists($slug)) { 
            $this->err404();
        }else{            
            // echo 'hello'; exit;
            $this->data['info'] = $this->Site_model->get_info_by_slug($slug);        
        }    

        $this->data['meta_keywords'] = $this->data['info']->meta_keys;
        $this->data['meta_description'] = $this->data['info']->short_desc;    

        $this->data['meta_title'] = $this->data['info']->name;
        $this->data['method'] = 'article';
        $this->data['subview'] = 'article';
        $this->load->view('frontend/_layout_main', $this->data);
    }


    public function err404(){

        // $this->data['related_item'] = $this->Site_model->get_related_course_not_found();

        $this->data['meta_title'] = 'Page not found';
        $this->data['subview'] = 'err404';
        $this->load->view('frontend/_layout_main', $this->data);
    }



    // public function contact_us(){
    //     $this->data['contact'] = $this->Site_model->get_contact(); 
    //     $this->data['meta_title'] = 'Contact Us';
    //     $this->data['method'] = 'contact';
    //     $this->data['subview'] = 'contact_us';
    //     $this->load->view('frontend/_layout_main', $this->data);
    // }

    


public function contact_us(){
    $this->load->helper('captcha');
    $vals = array(
    //'word'          => '',
    'img_path'      => './captcha_images/',
    'img_url'       => base_url().'/captcha_images/',
    'font_path'     => './path/to/fonts/texb.ttf',
    'img_width'     => '110',
    'img_height'    => 30,
    'expiration'    => 7200,
    'word_length'   => 4,
    'font_size'     => 16,
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
    $this->data['contact'] = $this->Site_model->get_contact(); 
    $this->data['meta_title'] = 'Contact Us';
    $this->data['method'] = 'contact';
    $this->data['subview'] = 'contact_us';
    $this->load->view('frontend/_layout_main', $this->data);
}




// public function sendemail(){

//     $this->data['setting'] = $this->Common_model->get_info('setting');

//     $this->load->library('email');

//     // $this->email->initialize(array(
//     //   'protocol' => 'smtp',
//     //   'smtp_host' => 'smtp.sendgrid.net',
//     //   'smtp_user' => 'sendgridusername',
//     //   'smtp_pass' => 'sendgridpassword',
//     //   'smtp_port' => 587,
//     //   'crlf' => "\r\n",
//     //   'newline' => "\r\n"
//     // ));

//     $this->email->from($this->input->post('email'), $this->input->post('name'));
//     $this->email->to($this->data['setting']->contact_email);
//     $this->email->subject($this->input->post('subject'));
//     $this->email->message($this->input->post('message'));
//     $this->email->send();

//     // echo $this->email->print_debugger();
//     redirect('contact-us');
// }
public function sendemail(){
    

            $this->data['setting'] = $this->Common_model->get_info('setting');
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

            public function terms(){   
 
                $this->data['meta_title'] = 'Terms & Conditions';        
                $this->data['subview'] = 'terms';
                $this->load->view('frontend/_layout_main', $this->data);
            } 

            public function privacyPolicy(){   
 
                $this->data['meta_title'] = 'Privacy Policy';        
                $this->data['subview'] = 'privacy-policy';
                $this->load->view('frontend/_layout_main', $this->data);
            } 

}