<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends Backend_Controller {

	var $img_path;
    var $img_path_icon;

	public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;

        $this->load->model('Common_model');
        $this->load->model('Packages_model');
        
        // Slug Generator
        $config = array(
            'field' => 'slug',
            'title' => 'name',
            'table' => 'packages',
            'id' => 'id',
        );
        $this->load->library('slug', $config);
    }

	public function index(){
        redirect('admin/packages/all');
	}

    public function all(){
        $this->data['results'] = $this->Common_model->get_data('packages'); 
        //Load page
        $this->data['meta_title'] = 'All package';
        $this->data['subview'] = 'packages/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function details($id){
        $this->data['info'] = $this->packages_model->get_info($id);
        $this->data['meta_title'] = 'Package Details';
        $this->data['subview'] = 'packages/details';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function edit($id){
        $this->form_validation->set_rules('packages_name', 'Package name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim');
        $this->data['info'] = $this->packages_model->get_info($id);
        if ($this->form_validation->run() == true){
            $form_data = array(
                'packages_name' => $this->input->post('packages_name'),
                'description' => $this->input->post('description'),
                'amount' => $this->input->post('amount'),
                'packages_item' => json_encode($this->input->post('packages_item')),
                'status' => $this->input->post('status'),
            );
            if($this->Common_model->edit('packages', $id, 'id', $form_data)){
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('admin/packages/all');
            }
        }
        $this->data['meta_title'] = 'Edit package';
        $this->data['subview'] = 'packages/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }


	public function add(){
        $this->form_validation->set_rules('packages_name', 'Package name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim');      
        if ($this->form_validation->run() == true){
            $form_data = array(
                'packages_name' => $this->input->post('packages_name'),
                'description' => $this->input->post('description'),
                'amount' => $this->input->post('amount'),
                'packages_item' => json_encode($this->input->post('packages_item')),
                'status' => $this->input->post('status'),
            );
            if($this->Common_model->save('packages', $form_data)){                
                $this->session->set_flashdata('success', 'New package insert successfully.');
               redirect("admin/packages/all");
            }
        }
		$this->data['meta_title'] = 'Add package';
		$this->data['subview'] = 'packages/add';
    	$this->load->view('backend/_layout_main', $this->data);
	}


    function delete($id) {
        $this->data['info'] = $this->packages_model->delete($id);
        $this->session->set_flashdata('success', 'Information delete successfully.');
        redirect('admin/packages/all');
    }

}