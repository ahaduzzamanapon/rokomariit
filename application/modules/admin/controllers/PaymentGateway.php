<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentGateway extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;

        $this->load->model('Common_model');
        $this->load->model('payment_gateway_model');

        // Slug Generator
        $config = array(
            'field' => 'slug',
            'title' => 'name',
            'table' => 'bkash_payment_gateway',
            'id' => 'id',
        );
        $this->load->library('slug', $config);
    }

    // List all records
    public function index()
    {
        $this->data['bkash_payments'] = $this->payment_gateway_model->get_all();

        $this->data['meta_title'] = 'All Gateway List';

        $this->data['subview'] = 'bkash/index';

        $this->load->view('backend/_layout_main', $this->data);
    }

    // Create form
    public function create()
    {
        $this->data['meta_title'] = 'Create Gateway ';

        $this->data['subview'] = 'bkash/create';

        $this->load->view('backend/_layout_main', $this->data);
    }

    // Save data to database
    public function save()
    {
        $this->form_validation->set_rules('bkash_app_key', 'Bkash App Key', 'required|trim');
        $this->form_validation->set_rules('bkash_app_secret', 'Bkash App Secret', 'required|trim');
        $this->form_validation->set_rules('bkash_username', 'Bkash Username', 'required|trim');
        $this->form_validation->set_rules('bkash_password', 'Bkash Password', 'required|trim');
        $this->form_validation->set_rules('bkash_mode', 'Bkash Mode', 'required|trim');
        $this->form_validation->set_rules('bkash_status', 'Bkash Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->create();
        }

        $data = array(
            'bkash_app_key' => $this->input->post('bkash_app_key'),
            'bkash_app_secret' => $this->input->post('bkash_app_secret'),
            'bkash_username' => $this->input->post('bkash_username'),
            'bkash_password' => $this->input->post('bkash_password'),
            'bkash_mode' => $this->input->post('bkash_mode'),
            'bkash_status' => $this->input->post('bkash_status')
        );

        $this->payment_gateway_model->insert($data);
        $this->session->set_flashdata('success', 'Successfully Created');
        redirect('admin/PaymentGateway/index');
    }

    // Edit form
    public function edit($id)
    {
        $this->data['bkash'] = $this->payment_gateway_model->get_by_id($id);

        $this->data['meta_title'] = 'Edit Gateway ';

        $this->data['subview'] = 'bkash/edit';

        $this->load->view('backend/_layout_main', $this->data);
    }

    // Update record
    public function update($id)
    {
        $this->form_validation->set_rules('bkash_app_key', 'Bkash App Key', 'required|trim');
        $this->form_validation->set_rules('bkash_app_secret', 'Bkash App Secret', 'required|trim');
        $this->form_validation->set_rules('bkash_username', 'Bkash Username', 'required|trim');
        $this->form_validation->set_rules('bkash_password', 'Bkash Password', 'required|trim');
        $this->form_validation->set_rules('bkash_mode', 'Bkash Mode', 'required|trim');
        $this->form_validation->set_rules('bkash_status', 'Bkash Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->create();
        }
        $data = array(
            'bkash_app_key' => $this->input->post('bkash_app_key'),
            'bkash_app_secret' => $this->input->post('bkash_app_secret'),
            'bkash_username' => $this->input->post('bkash_username'),
            'bkash_password' => $this->input->post('bkash_password'),
            'bkash_mode' => $this->input->post('bkash_mode'),
            'bkash_status' => $this->input->post('bkash_status')
        );

        $this->payment_gateway_model->update($id, $data);
        $this->session->set_flashdata('success', 'Gateway update successfully.');
        redirect('admin/PaymentGateway/index');
    }

    // Delete record
    public function delete($id)
    {
        $this->payment_gateway_model->delete($id);
        $this->session->set_flashdata('success', 'Gateway delete successfully.');
        redirect('admin/PaymentGateway/index');
    }
}
