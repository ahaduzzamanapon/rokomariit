<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_history extends Backend_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()):
			redirect('login');
		endif;

		$this->load->model('Dashboard_model');
	}

	public function index($page = 0)
	{
		if ($this->ion_auth->in_group([4])) {
			$user_id = $this->session->userdata('user_id');
		}

		// Load pagination library
		$this->load->library('pagination');

		// Configure pagination
		$config['base_url'] = base_url('admin/purchase_history/index');
		$config['total_rows'] = $this->db->count_all_results('user_purchase_packages');
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;

		// Pagination styling (Bootstrap)
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		// Get paginated data
		$this->db->select('user_purchase_packages.*,user_purchase_packages.id as purchase_id,user_purchase_packages.status as purchase_status,payment_info.payment_type,payment_info.status_title,packages.*,users.*');
		$this->db->from('user_purchase_packages');
		$this->db->join('payment_info', 'payment_info.mer_txnid = user_purchase_packages.transaction_id', 'left');
		$this->db->join('packages', 'packages.id = user_purchase_packages.package_id', 'left');
		$this->db->join('users', 'users.id = user_purchase_packages.user_id', 'left');
		if (isset($user_id)) {
			$this->db->where('user_purchase_packages.user_id', $user_id);
		}
		$this->db->order_by('user_purchase_packages.id', 'DESC');
		$this->db->limit($config['per_page'], $page);
		$this->data['results'] = $this->db->get()->result();
		// dd($this->data['results']);
		// Pass pagination links
		$this->data['pagination_links'] = $this->pagination->create_links();

		$this->data['meta_title'] = 'Purchase history';
		$this->data['subview'] = 'purchase_history/index';
		$this->load->view('backend/_layout_main', $this->data);
	}


	public function details($id)
	{

		$this->db->select('user_purchase_packages.*,users.*,user_purchase_packages.status as purchase_status');
		$this->db->from('user_purchase_packages');
		$this->db->join('users', 'users.id = user_purchase_packages.user_id', 'left');
		$this->db->where('user_purchase_packages.id', $id);
		$this->data['user_purchase_packages'] = $this->db->get()->row();
		$this->data['package_info'] = $this->db->where('id', $this->data['user_purchase_packages']->package_id)->get('packages')->row();
		$this->data['payment_info'] = $this->db->where('mer_txnid', $this->data['user_purchase_packages']->transaction_id)->get('payment_info')->row();

		// dd($this->data['payment_info']);
		$this->data['meta_title'] = 'Package Details';
		$this->data['subview'] = 'purchase_history/details';
		$this->load->view('backend/_layout_main', $this->data);
	}

	public function changeStatus()
	{

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('user_purchase_packages', ['status' => $status]);
		echo 'success';
	}

	// public function due_payment($name) 
	// {
	// 	$name = urldecode($name);
	// 	// dd($name);
    //     $this->db->where('packages_name', $name);
    //     $this->data['package_info'] = $this->db->get('packages')->row();
    //     $user_id = $this->session->userdata('user_id');
    //     if ($user_id) {
    //         $this->data['user_info'] = $this->db->where('id', $user_id)->get('users')->row();
    //     } else {
    //         $this->data['user_info'] = null;
    //     }

    //     $this->data['meta_title'] = 'Packages Purchase';
    //     $this->data['meta_keywords'] = 'Packages Purchase';
    //     $this->data['meta_description'] = 'Packages Purchase';
    //     $this->data['method'] = 'packages';
    //     $this->data['subview'] = 'purchase_history/due_payment';
    //     $this->load->view('frontend/_layout_main', $this->data);
    // }
	
	public function purchase_pdf($id)
	{
		$this->data['user_purchase_packages'] = $this->db->where('id', $id)->get('user_purchase_packages')->row();
		$this->data['package_info'] = $this->db->where('id', $this->data['user_purchase_packages']->package_id)->get('packages')->row();
		$this->data['payment_info'] = $this->db->where('mer_txnid', $this->data['user_purchase_packages']->transaction_id)->get('payment_info')->row();
		// dd($this->data['package_info']);

		$this->data['meta_title'] = 'Package Details';
		$this->data['subview'] = 'purchase_history/purchase_pdf';
		$this->load->view('backend/_layout_main', $this->data);
	}

	// public function blank(){
	// 	$this->data['page_heading'] = 'Blank Page';
	// 	$this->data['subview'] = 'dashboard/blank';
	// 	$this->load->view('backend/_layout_main', $this->data);
	// }	

}
