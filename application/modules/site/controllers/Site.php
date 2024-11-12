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




    public function packages(){
        $this->data['meta_title'] = 'Packages';
        $this->data['method'] = 'packages';
        $this->data['subview'] = 'packages';
        $this->load->view('frontend/_layout_main', $this->data);
    }
    public function purchase_create($id){




        $this->db->where('id', $id);
        $this->data['package_info'] = $this->db->get('packages')->row();
        $user_id=$this->session->userdata('user_id');
        if ($user_id) {
            $this->data['user_info'] = $this->db->where('id', $user_id)->get('users')->row();
        }else{
            $this->data['user_info']=null;
        }

        $this->data['meta_title'] = 'Packages Purchase';
        $this->data['method'] = 'packages';
        $this->data['subview'] = 'packages_purchase';
        $this->load->view('frontend/_layout_main', $this->data);
    }

    public function payment_process(){
        $user_id=$this->input->post('user_id');
        $package_id=$this->input->post('package_id');
        if ($user_id=='' || $user_id==null) {
            $password=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
            $data_user_info=array(
                'ip_address'=>0,
                'username'=>$this->input->post('email'),
                'password'=>$this->hash_password($password, PASSWORD_DEFAULT),
                'password_r'=>$password,
                'salt'=>null,
                'email'=>$this->input->post('email'),
                'active'=>1,
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'phone'=>$this->input->post('number'),
            );
            $this->db->insert('users', $data_user_info);
            $user_id=$this->db->insert_id();
            $data_group_info=array(
                'user_id'=>$user_id,
                'group_id'=>4,
            );
            $this->db->insert('users_groups', $data_group_info);
            $this->trigger_login($this->input->post('email'), $password);

            $data_view = '
            <p>Hi, here are your login credentials:</p>
            <p>Username: ' . htmlspecialchars($this->input->post('email')) . '</p>
            <p>Password: ' . htmlspecialchars($password) . '</p>
            <p>Link: <a href="' . base_url('site/login') . '">' . base_url('site/login') . ' Go to login </a></p>
            ';
            $this->session->set_flashdata('credentials', $data_view);

            
        }

        $this->initiatePayment($user_id,$package_id);



    }



    public function initiatePayment($user_id, $package_id)
    {
        $user_info = $this->db->where('id', $user_id)->get('users')->row();
        $package_info = $this->db->where('id', $package_id)->get('packages')->row();
    
        $email = $user_info->email;
        $amount = $package_info->amount;
        $store_id = "aamarpaytest";  // Replace with your Store ID / Merchant ID
        $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183"; // Replace with your signature key from AamarPay
        $url = 'https://sandbox.aamarpay.com/jsonpost.php'; // Sandbox URL
        // $url = 'https://secure.aamarpay.com/jsonpost.php'; // Live URL
        $success_url = base_url("payment/success/{$user_id}/{$package_id}");
        $fail_url = base_url("payment/fail/{$package_id}");
        $cancel_url = base_url("payment/cancel/{$package_id}");
        $tran_id = "rit" . time() . rand(1111111, 9999999); // Unique transaction ID
    
        $this->load->library('curl');
    
        // Prepare data for JSON payload
        $postData = array(
            "store_id" => $store_id,
            "tran_id" => $tran_id,
            "success_url" => $success_url,
            "fail_url" => $fail_url,
            "cancel_url" => $cancel_url,
            "amount" => $amount,
            "currency" => "BDT",
            "signature_key" => $signature_key,
            "desc" => "Package Payment for " . $package_info->packages_name,
            "cus_name" => $user_info->first_name . ' ' . $user_info->last_name,
            "cus_email" => $email,
            "cus_add1" => "Shapla House 363/H/2",
            "cus_add2" => "North Pirerbag",
            "cus_city" => "Dhaka",
            "cus_state" => "Dhaka",
            "cus_postcode" => "1207",
            "cus_country" => "Bangladesh",
            "cus_phone" => $user_info->phone,
            "type" => "json"
        );
    
        // Initialize cURL
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            // Add these lines to disable SSL verification (for development only)
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));
        
    
        // Execute request and handle potential errors
        $response = curl_exec($curl);
    
        if (curl_errno($curl)) {
            // Handle cURL error
            echo "cURL Error: " . curl_error($curl);
            curl_close($curl);
            return;
        }
    
        curl_close($curl);
    
        // Decode response
        $responseObj = json_decode($response);
        
        // Check if payment URL exists and redirect
        if (isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {
            $paymentUrl = $responseObj->payment_url;
            header("Location: " . $paymentUrl);
            exit();
        } else {
            // Log or display response if payment_url is not available
            echo "Error in Payment Processing: ";
            print_r($response);
        }
    }
    
    public function payment_success($user_id,$package_id){
        $merTxnId = $_POST['mer_txnid'];
        $store_id = "aamarpaytest";  // You have to use your Store ID / MerchantID here
        $signature_key="dbb74894e82415a2f7ff0ec3a97e4183"; // Your have to use your signature key here ,it will be provided by aamarPay
        $url = "https://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$merTxnId&store_id=$store_id&signature_key=$signature_key&type=json"; //sandbox
      //$url = "https://secure.aamarpay.com/api/v1/trxcheck/request.php?request_id=$merTxnId&store_id=$store_id&signature_key=$signature_key&type=json"; //live url
      $this->load->library('curl');

      $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$url);

        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $a = (array)json_decode($buffer);
        // echo "<pre>";
        // print_r($a);
        // echo "</pre>";
        $this->add_package($user_id,$package_id,$a);
    }
    public function payment_fail($package_id){
        $merTxnId = $_POST['mer_txnid'];
        $store_id = "aamarpaytest";  // You have to use your Store ID / MerchantID here
        $signature_key="dbb74894e82415a2f7ff0ec3a97e4183"; // Your have to use your signature key here ,it will be provided by aamarPay
        $url = "https://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$merTxnId&store_id=$store_id&signature_key=$signature_key&type=json"; //sandbox
      //$url = "https://secure.aamarpay.com/api/v1/trxcheck/request.php?request_id=$merTxnId&store_id=$store_id&signature_key=$signature_key&type=json"; //live url
      $this->load->library('curl');

      $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$url);

        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $a = (array)json_decode($buffer);
        // echo "<pre>";
        // print_r($a);
        // echo "</pre>";
        
        $this->session->set_flashdata('error', 'Payment Fail');
        redirect(base_url('site/purchase_create/'.$package_id));
    }
    public function payment_cancel($id){
        //dd('this');
        $this->session->set_flashdata('error', 'Payment Cancel');
        redirect(base_url("site/purchase_create/$id"));
    }

    public function add_package($user_id,$package_id,$a){
        $user_info=$this->db->where('id', $user_id)->get('users')->row();
        $package_info=$this->db->where('id', $package_id)->get('packages')->row();


            if (!$this->db->table_exists('payment_info')) {
                $this->load->dbforge();
                $fields = array(
                    'user_id' => array('type' => 'INT', 'null' => TRUE),
                    'package_id' => array('type' => 'INT', 'null' => TRUE),
                    'pg_txnid' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'mer_txnid' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'risk_title' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'risk_level' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'cus_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
                    'cus_email' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
                    'cus_phone' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'desc' => array('type' => 'TEXT', 'null' => TRUE),
                    'cus_add1' => array('type' => 'TEXT', 'null' => TRUE),
                    'cus_add2' => array('type' => 'TEXT', 'null' => TRUE),
                    'cus_city' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'cus_state' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'cus_postcode' => array('type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE),
                    'cus_country' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'cus_fax' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'ship_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
                    'ship_add1' => array('type' => 'TEXT', 'null' => TRUE),
                    'ship_add2' => array('type' => 'TEXT', 'null' => TRUE),
                    'ship_city' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'ship_state' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'ship_postcode' => array('type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE),
                    'ship_country' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'merchant_id' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'store_id' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'amount' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'amount_bdt' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'amount_original' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'pay_status' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'status_code' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'status_title' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'cardnumber' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'approval_code' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'payment_processor' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'bank_trxid' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'payment_type' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'error_code' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'error_title' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'bin_country' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'bin_issuer' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'bin_cardtype' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'bin_cardcategory' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'date' => array('type' => 'DATETIME', 'null' => TRUE),
                    'date_processed' => array('type' => 'DATETIME', 'null' => TRUE),
                    'amount_currency' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'rec_amount' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'store_amount' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'processing_ratio' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'processing_charge' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'ip' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'currency' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'currency_merchant' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'convertion_rate' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => TRUE),
                    'opt_a' => array('type' => 'TEXT', 'null' => TRUE),
                    'opt_b' => array('type' => 'TEXT', 'null' => TRUE),
                    'opt_c' => array('type' => 'TEXT', 'null' => TRUE),
                    'opt_d' => array('type' => 'TEXT', 'null' => TRUE),
                    'verify_status' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'call_type' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'email_send' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'doc_recived' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                    'checkout_status' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE),
                );
                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('payment_info');
            }
            
            $data = array(
                'user_id' => $user_id,
                'package_id' => $package_id,
                'pg_txnid' => $a['pg_txnid'],
                'mer_txnid' => $a['mer_txnid'],
                'risk_title' => $a['risk_title'],
                'risk_level' => $a['risk_level'],
                'cus_name' => $a['cus_name'],
                'cus_email' => $a['cus_email'],
                'cus_phone' => $a['cus_phone'],
                'desc' => $a['desc'],
                'cus_add1' => $a['cus_add1'],
                'cus_add2' => $a['cus_add2'],
                'cus_city' => $a['cus_city'],
                'cus_state' => $a['cus_state'],
                'cus_postcode' => $a['cus_postcode'],
                'cus_country' => $a['cus_country'],
                'cus_fax' => $a['cus_fax'],
                'ship_name' => $a['ship_name'],
                'ship_add1' => $a['ship_add1'],
                'ship_add2' => $a['ship_add2'],
                'ship_city' => $a['ship_city'],
                'ship_state' => $a['ship_state'],
                'ship_postcode' => $a['ship_postcode'],
                'ship_country' => $a['ship_country'],
                'merchant_id' => $a['merchant_id'],
                'store_id' => $a['store_id'],
                'amount' => $a['amount'],
                'amount_bdt' => $a['amount_bdt'],
                'amount_original' => $a['amount_original'],
                'pay_status' => $a['pay_status'],
                'status_code' => $a['status_code'],
                'status_title' => $a['status_title'],
                'cardnumber' => $a['cardnumber'],
                'approval_code' => $a['approval_code'],
                'payment_processor' => $a['payment_processor'],
                'bank_trxid' => $a['bank_trxid'],
                'payment_type' => $a['payment_type'],
                'error_code' => $a['error_code'],
                'error_title' => $a['error_title'],
                'bin_country' => $a['bin_country'],
                'bin_issuer' => $a['bin_issuer'],
                'bin_cardtype' => $a['bin_cardtype'],
                'bin_cardcategory' => $a['bin_cardcategory'],
                'date' => $a['date'],
                'date_processed' => $a['date_processed'],
                'amount_currency' => $a['amount_currency'],
                'rec_amount' => $a['rec_amount'],
                'store_amount' => $a['store_amount'],
                'processing_ratio' => $a['processing_ratio'],
                'processing_charge' => $a['processing_charge'],
                'ip' => $a['ip'],
                'currency' => $a['currency'],
                'currency_merchant' => $a['currency_merchant'],
                'convertion_rate' => $a['convertion_rate'],
                'opt_a' => $a['opt_a'],
                'opt_b' => $a['opt_b'],
                'opt_c' => $a['opt_c'],
                'opt_d' => $a['opt_d'],
                'verify_status' => $a['verify_status'],
                'call_type' => $a['call_type'],
                'email_send' => $a['email_send'],
                'doc_recived' => $a['doc_recived'],
                'checkout_status' => $a['checkout_status'],
            );
            $this->db->insert('payment_info', $data);
            $insert_id = $this->db->insert_id();
            $data_user_purchase_packages=array(
                'user_id'=>$user_id,
                'package_id'=>$package_id,
                'status'=>1,
                'payment_status'=>1,
                'payment_id'=>$insert_id,
                'transaction_id'=>$a['mer_txnid'],
                'create_at'=>date('Y-m-d H:i:s'),
            );
            $this->db->insert('user_purchase_packages', $data_user_purchase_packages);
            $this->session->set_flashdata('success', 'Payment Successful');
            redirect(base_url("site/purchase_create/$package_id"));
    }
    public function trigger_login($email, $password){
        $title="Login Credentials";
        $data_view = '
        <p>Hi, here are your login credentials:</p>
        <p>Username: ' . htmlspecialchars($email) . '</p>
        <p>Password: ' . htmlspecialchars($password) . '</p>
        <p>Link: <a href="' . base_url('admin') . '">' . base_url('admin') . ' Go to login </a></p>
        ';
        $this->send_mail($email,$title,$data_view);
        // Replace with actual user credentials
        $usernameOrEmail = $email;
        $password = $password;
        $remember = true; 
        $this->ion_auth->login($usernameOrEmail, $password, $remember);
    }
    public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
	{
		if (empty($password))
		{
			return FALSE;
		}

		// bcrypt
		// if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		// {
			return $this->bcrypt->hash($password);
		// }


		// if ($this->store_salt && $salt)
		// {
		// 	return  sha1($password . $salt);
		// }
		// else
		// {
		// 	$salt = $this->salt();
		// 	return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		// }
	}


    public function send_mail($email,$title,$data_view){
        $this->load->library('email');
        $this->email->initialize(array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'smtp.gmail.com',
                  'smtp_user' => 'contact.mysoftheaven@gmail.com',
                  'smtp_pass' => 'dzqhjzslkjhdhiis',
                  'smtp_port' => 587,
                  'crlf' => "\r\n",
                  'newline' => "\r\n"
                ));
          
            //   $this->email->initialize($config);
          
              $this->email->from('rokomariit@gmail.com', 'Rokomariit.com');
              $this->email->to($email);
              $this->email->subject($title);
              $this->email->message($data_view);
          
              if (!$this->email->send()) {
                // dd($this->email->print_debugger());
                  log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
                  // Optionally redirect to an error page or show a message
              }
        
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