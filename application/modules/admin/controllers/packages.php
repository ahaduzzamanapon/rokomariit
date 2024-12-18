<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packages extends Backend_Controller
{

    var $img_path;
    var $img_path_icon;

    public function __construct()
    {
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

    public function index()
    {
        redirect('admin/packages/all');
    }

    public function all()
    {
        $this->data['results'] = $this->Common_model->get_data('packages');
        //Load page
        $this->data['meta_title'] = 'All package';
        $this->data['subview'] = 'packages/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function details($id)
    {
        $this->data['info'] = $this->packages_model->get_info($id);
        $this->data['meta_title'] = 'Package Details';
        $this->data['subview'] = 'packages/details';
        $this->load->view('backend/_layout_main', $this->data);
    }

    // public function edit($id)
    // {
    //     $this->form_validation->set_rules('packages_name', 'Package name', 'required|trim');
    //     $this->form_validation->set_rules('description', 'Description', 'required|trim');
    //     $this->form_validation->set_rules('amount', 'Amount', 'required|trim');
    //     $this->data['info'] = $this->packages_model->get_info($id);
    //     if ($this->form_validation->run() == true) {
    //         $form_data = array(
    //             'packages_name' => $this->input->post('packages_name'),
    //             'description' => $this->input->post('description'),
    //             'amount' => $this->input->post('amount'),
    //             'packages_item' => json_encode($this->input->post('packages_item')),
    //             'status' => $this->input->post('status'),
    //         );
    //         if ($this->Common_model->edit('packages', $id, 'id', $form_data)) {
    //             $this->session->set_flashdata('success', 'Information update successfully.');
    //             redirect('admin/packages/all');
    //         }
    //     }
    //     $this->data['meta_title'] = 'Edit package';
    //     $this->data['subview'] = 'packages/edit';
    //     $this->load->view('backend/_layout_main', $this->data);
    // }


    public function add()
    {
        $this->form_validation->set_rules('packages_name', 'Package name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        // $this->form_validation->set_rules('amount', 'Amount', 'required|trim');

        if ($this->form_validation->run() == true) {
            // Get packages_item array and encode to JSON
            $packages_item = $this->input->post('packages_item');

            // Convert input into a clean JSON structure
            $packages_item_json = json_encode($packages_item);
            // dd($packages_item);
            $form_data = array(
                'packages_name' => $this->input->post('packages_name'),
                'description' => $this->input->post('description'),
                'amount' => $this->input->post('amount'),
                'packages_item' => $packages_item_json, // Save as JSON
                'status' => $this->input->post('status'),
            );

            if ($this->Common_model->save('packages', $form_data)) {
                $this->session->set_flashdata('success', 'New package inserted successfully.');
                redirect("admin/packages/all");
            }
        }

        $this->data['meta_title'] = 'Add package';
        $this->data['subview'] = 'packages/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function edit($id)
    {
        // Fetch the package data
        $package = $this->db->get_where('packages', ['id' => $id])->row();
        // dd($package);

        if (!$package) {
            $this->session->set_flashdata('error', 'Invalid package ID!');
            redirect('admin/packages/all');
        }

        // Decode package items JSON
        $package_items = json_decode($package->packages_item, true);

        $this->data['package'] = $package;
        $this->data['package_items'] = $package_items ? $package_items : [];
        // dd($data['package_items']);
        // $this->load->view('admin/packages/edit', $data);
        // dd($this->data);
        $this->data['meta_title'] = 'Edit package';
        $this->data['subview'] = 'packages/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function update($id)
    {
        // dd($id);
        // Set validation rules
        $this->form_validation->set_rules('packages_name', 'Package Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Discount', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[1,2]');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id); // Reload edit view with validation errors
        } else {
            $packages_item = $this->input->post('packages_item');

            // Convert input into a clean JSON structure
            $packages_item_json = json_encode($packages_item);
            // dd($packages_item);
            $form_data = array(
                'packages_name' => $this->input->post('packages_name'),
                'description' => $this->input->post('description'),
                'amount' => $this->input->post('amount'),
                'packages_item' => $packages_item_json, // Save as JSON
                'status' => $this->input->post('status'),
            );

            $this->db->where('id', $id);
            $updated = $this->db->update('packages', $form_data);

            if ($updated) {
                $this->session->set_flashdata('success', 'Package updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update package!');
            }

            redirect('admin/packages/all');
        }
    }



    function delete($id)
    {
        $this->data['info'] = $this->packages_model->delete($id);
        $this->session->set_flashdata('success', 'Information delete successfully.');
        redirect('admin/packages/all');
    }
}
