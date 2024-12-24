<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Script extends Backend_Controller {
	public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;
        $this->load->model('Common_model');
        $this->load->model('Script_model');
    }
	public function index(){
        redirect('admin/script/all');
	}
    public function all(){
        $this->data['results'] = $this->Common_model->get_data('script'); 
        
        // print_r($this->data['results']); exit;
        //Load page
        $this->data['meta_title'] = 'All script';
        $this->data['subview'] = 'script/all';
        $this->load->view('backend/_layout_main', $this->data);
    }
    public function details($id){
        $this->data['info'] = $this->Script_model->get_info($id);
        $this->data['meta_title'] = 'script Details';
        $this->data['subview'] = 'script/details';
        $this->load->view('backend/_layout_main', $this->data);
    }
    public function edit($id){
        $this->form_validation->set_rules('script', 'script', 'required');
        $this->data['info'] = $this->Script_model->get_info($id);
        if ($this->form_validation->run() == true){
            $form_data = array(
                'script' => $this->input->post('script'),
                'page_link' => $this->input->post('page_link'),
                'type' => $this->input->post('type'),
            );
            // print_r($form_data); exit;
            if($this->Common_model->edit('script', $id, 'id', $form_data)){
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('admin/script/all');
            }
        }
        $this->data['meta_title'] = 'Edit script';
        $this->data['subview'] = 'script/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }
	public function add(){
        $this->form_validation->set_rules('script', 'script', 'required');
        if ($this->form_validation->run() == true){
            $form_data = array(
                'script' => $this->input->post('script'),
                'page_link' => $this->input->post('page_link'),
                'type' => $this->input->post('type'),
            );
            if($this->Common_model->save('script', $form_data)){                
                $this->session->set_flashdata('success', 'New script insert successfully.');
               redirect("admin/script/all");
            }
        }
		$this->data['meta_title'] = 'Add script';
		$this->data['subview'] = 'script/add';
    	$this->load->view('backend/_layout_main', $this->data);
	}
    function delete($id) {
        $this->data['info'] = $this->Script_model->delete($id);
        $this->session->set_flashdata('success', 'Information delete successfully.');
        redirect('admin/script/all');
    }
}