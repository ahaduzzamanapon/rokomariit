<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_history extends Backend_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;

        $this->load->model('Dashboard_model');
    }

	public function index()
	{
		if($this->ion_auth->in_group([4])){
			$user_id=$this->session->userdata('user_id');
		}


		$this->db->select('user_purchase_packages.*,user_purchase_packages.id as purchase_id,user_purchase_packages.status as purchase_status,payment_info.payment_type,payment_info.status_title,packages.*,users.*');
		$this->db->from('user_purchase_packages');
		$this->db->join('payment_info', 'payment_info.mer_txnid = user_purchase_packages.transaction_id', 'left');
		$this->db->join('packages', 'packages.id = user_purchase_packages.package_id', 'left');
		$this->db->join('users', 'users.id = user_purchase_packages.user_id', 'left');
		if(isset($user_id)){
			$this->db->where('user_purchase_packages.user_id', $user_id);
		}
		$this->data['results'] = $this->db->get()->result(); 
		$this->data['meta_title'] = 'Purchase history';
		$this->data['subview'] = 'purchase_history/index';
    	$this->load->view('backend/_layout_main', $this->data);
	}

	public function details($id){

		$this->db->select('user_purchase_packages.*,users.*,user_purchase_packages.status as purchase_status');
		$this->db->from('user_purchase_packages');
		$this->db->join('users', 'users.id = user_purchase_packages.user_id', 'left');
		$this->db->where('user_purchase_packages.id', $id);
		$this->data['user_purchase_packages'] = $this->db->get()->row();
		$this->data['package_info'] = $this->db->where('id', $this->data['user_purchase_packages']->package_id)->get('packages')->row();
		$this->data['payment_info'] = $this->db->where('mer_txnid', $this->data['user_purchase_packages']->transaction_id)->get('payment_info')->row();

		// dd($this->data);
		$this->data['meta_title'] = 'Package Details';
		$this->data['subview'] = 'purchase_history/details';
		$this->load->view('backend/_layout_main', $this->data);
	}

	public function changeStatus(){

		$id=$this->input->post('id');
		$status=$this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('user_purchase_packages', ['status' => $status]);
		echo 'success';
		
	}

	// public function blank(){
	// 	$this->data['page_heading'] = 'Blank Page';
	// 	$this->data['subview'] = 'dashboard/blank';
    // 	$this->load->view('backend/_layout_main', $this->data);
	// }	

}