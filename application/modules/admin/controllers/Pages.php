<?php

defined('BASEPATH') or exit('No direct script access allowed');

//include('url_slug.php');

//header('Content-type: text/plain; charset=utf-8');



class Pages extends Backend_Controller
{
    var $img_path;

    public function __construct()
    {

        parent::__construct();

        if (!$this->ion_auth->logged_in()):

            redirect('login');

        endif;

        $this->load->model('Common_model');

        $this->load->model('Pages_model');

        $this->img_path = realpath(APPPATH . '../pages_img');



        // Slug Generator

        $config = array(

            'field' => 'slug',

            'title' => 'name',

            'table' => 'pages',

            'id' => 'id',

        );

        $this->load->library('slug', $config);
    }



    public function index()
    {

        redirect('admin/pages/all');
    }



    public function all()
    {





        $this->data['results'] = $this->db->order_by('id', 'desc')->get('pages')->result();

        // print_r($this->data['results']); exit;

        //Load page

        $this->data['meta_title'] = 'All Event';

        $this->data['subview'] = 'pages/all';

        $this->load->view('backend/_layout_main', $this->data);
    }



    public function details($id)
    {

        $this->data['info'] = $this->Pages_model->get_info($id);

        $this->data['meta_title'] = 'Event Details';

        $this->data['subview'] = 'pages/details';

        $this->load->view('backend/_layout_main', $this->data);
    }



    public function edit($id)
    {



        $this->form_validation->set_rules('title_pages', 'pages title', 'required|trim');

        if ($this->form_validation->run() == true) {

            $slug_data = array('title' => $this->input->post('title_pages'));

            $form_data = array(

                'title' => $this->input->post('title_pages'),

                'page_link' => $this->input->post('link_pages'),

                'slug' =>  $this->slug->create_uri($slug_data),

                'description' =>  $this->input->post('description_pages'),

                'meta_keys' =>  $this->input->post('meta_keys_pages'),

                'meta_description' =>  $this->input->post('meta_description_pages'),

                'meta_tags' =>  $this->input->post('meta_tags_pages'),

                'status' => 1,

            );

            $this->db->where('id', $id);

            if ($this->db->update('pages', $form_data)) {

                $this->session->set_flashdata('success', 'Information update successfully');

                redirect('admin/pages/all');
            } else {

                $this->session->set_flashdata('error', 'Information not update successfully');

                redirect('admin/pages/edit/' . $id);
            }
        }



        $this->data['info'] = $this->Pages_model->get_info($id);

        $this->data['meta_title'] = 'Add Pages';

        $this->data['subview'] = 'pages/edit';

        $this->load->view('backend/_layout_main', $this->data);
    }





    public function add()
    {
        // Validate the required fields
        $this->form_validation->set_rules('title_pages', 'pages title', 'required|trim');

        if ($this->form_validation->run() == true) {
            // 1. Collect the multiple name/link arrays from the form
            $metaNamePages = $this->input->post('meta_name_pages'); // array of names
            $metaLinkPages = $this->input->post('meta_link_pages'); // array of links

            // 2. Combine each pair into a single array
            $combinedData = array();
            if (!empty($metaNamePages) && is_array($metaNamePages)) {
                foreach ($metaNamePages as $index => $nameValue) {
                    $combinedData[] = array(
                        'name' => $nameValue,
                        // fallback if link doesn't exist at that index
                        'link' => isset($metaLinkPages[$index]) ? $metaLinkPages[$index] : ''
                    );
                }
            }

            // 3. Prepare the rest of your form data
            $slug_data = array('title' => $this->input->post('title_pages'));
            $tags = $this->input->post('meta_tags_pages'); // This is now a comma-separated string

            $form_data = array(
                'title'            => $this->input->post('title_pages'),
                'page_link'        => $this->input->post('link_pages'),
                'slug'             => $this->slug->create_uri(array('title' => $this->input->post('title_pages'))),
                'description'      => $this->input->post('description_pages'),
                'meta_keys'        => $this->input->post('meta_keys_pages'),
                'meta_description' => $this->input->post('meta_description_pages'),
                'meta_tags'        => $tags,  // Store as plain text
                'status'           => 1,
                'name_link'        => json_encode($combinedData),
                'imagelink'        => $this->input->post('imagelink'),
            );

            if ($this->Common_model->save('pages', $form_data)) {
                // Save tags to 'tags' table
                $tagArray = explode(',', $tags); // Split into array
                $link = 'pages/' . $this->input->post('link_pages');

                $tagsArray = json_decode($tags, true); // Decode JSON to array

                if (is_array($tagsArray)) {
                    $tagValues = [];
                    foreach ($tagsArray as $tag) {
                        $tagValues[] = $tag['value']; // Extract only the value
                    }
                    // dd($tagValues);
                    foreach ($tagValues as $tag) {

                        $tags = explode(' ', $tag);
                        $tag = implode('-', $tags);

                        $this->db->insert('tags', array('tag' => $tag, 'url' => $link));
                    }
                    // Convert array to a comma-separated string before inserting into DB
                    // $tagsString = implode(',', $tagValues);

                }

                // foreach ($tagArray as $str) {
                //     dd($str);
                //     $this->db->insert('tags', array('tag' => trim($str), 'url' => $link));
                // }

                $this->session->set_flashdata('success', 'New Page saved successfully.');
                redirect("admin/pages/all");
            }
        }

        // On initial load or validation error
        $this->data['meta_title'] = 'Add Pages';
        $this->data['subview']    = 'pages/add';
        $this->load->view('backend/_layout_main', $this->data);
    }



    public function file_check($str)
    {

        $this->load->helper('file');

        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/png', 'image/x-png');

        $mime = get_mime_by_extension($_FILES['userfile']['name']);

        $file_size = 1050000;

        $size_kb = '1 MB';



        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {

            if (!in_array($mime, $allowed_mime_type_arr)) {

                $this->form_validation->set_message('file_check', 'Please select only jpg, jpeg, png, gif file.');

                return false;
            } elseif ($_FILES["userfile"]["size"] > $file_size) {

                $this->form_validation->set_message('file_check', 'Maximum file size ' . $size_kb);

                return false;
            } else {

                return true;
            }
        } else {

            $this->form_validation->set_message('file_check', 'Please choose a image file to upload.');

            return false;
        }
    }



    function delete($id)
    {

        $this->data['info'] = $this->Pages_model->delete($id);

        $this->session->set_flashdata('success', 'Information delete successfully.');

        redirect('admin/pages/all');
    }



    function upload_image()
    {

        $this->load->library('upload');

        $config['upload_path'] = $this->img_path;

        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $config['max_size'] = 0;

        $config['file_name'] = time() . '_' . str_replace(' ', '_', $_FILES['userfile']['name']);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {

            $error = $this->upload->display_errors();

            $this->session->set_flashdata('error', $error);

            redirect($_SERVER['HTTP_REFERER']);
        } else {

            $data = $this->upload->data();

            $img_path = base_url() . 'pages_img/' . $data['file_name'];

            $link = $data['file_name'];
        }



        // image_path	image_link	img_alt	

        $form_data = array(

            'image_path' => $img_path,

            'image_link' => $link,

            'img_alt' => $img_path

        );

        $this->db->insert('image', $form_data);

        echo $img_path;
    }

    function link_check()
    {

        $str = $this->input->post('link');

        $this->db->like('page_link', $str);

        $query = $this->db->get('pages');

        // dd($query->result());

        if ($query->num_rows() > 0) {

            echo "have";
        } else {

            echo "no";
        }
    }

    public function tag_add()
    {
        // Enable error reporting for debugging
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        header('Content-Type: application/json'); // Ensure proper JSON response

        // Read raw POST data
        $tag = $this->input->post('tag', true); // Get tag input as plain text

        if (!$tag) {
            echo json_encode(["status" => "error", "message" => "No tag provided"]);
            return;
        }

        $tag = trim($tag); // Trim whitespace

        // Try extracting JSON value manually if stored as JSON string
        $this->db->select("tag");
        $query = $this->db->get('tags');

        $exists = false;
        foreach ($query->result() as $row) {
            $dbTag = $row->tag;

            // If the stored tag is a JSON string, extract the value
            $decodedTag = json_decode($dbTag, true);
            if (is_array($decodedTag) && isset($decodedTag['value'])) {
                $dbTag = $decodedTag['value'];
            }

            if ($dbTag === $tag) {
                $exists = true;
                break;
            }
        }

        if ($exists) {
            echo json_encode(["status" => "have", "message" => "Tag already exists"]);
        } else {
            echo json_encode(["status" => "no", "message" => "Tag is available"]);
        }

        exit;
    }
}
