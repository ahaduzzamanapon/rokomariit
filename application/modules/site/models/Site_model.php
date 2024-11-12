<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

     public function get_products($data) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('status', 1);
        $this->db->where('category', $data);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_news($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_clicen($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_slider() {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

     public function get_concern() {
        $this->db->select('*');
        $this->db->from('concern');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_testimonial() {
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_product() {
        $this->db->select('id, fa_icon, name, slug, image_file');
        $this->db->from('product');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    // public function get_table_data($table) {
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     $this->db->where('status', 1);
    //     $query = $this->db->get()->result();        

    //     return $query;
    // }


    public function get_contact() {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }
     public function get_limit_product() {
        $this->db->select('id, fa_icon, name, slug, image_file');
        $this->db->from('product');
        $this->db->where('status', 1);
        $this->db->limit(2);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_footer_address_show($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 1);
        $this->db->limit(2);
        $query = $this->db->get()->result();        

        return $query;
    }
    public function get_client() {
        $this->db->select('id, project_name, client_name, image_file, client_type');
        $this->db->from('client');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_info_gallery($id) {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('category_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_category($table) {
        $this->db->select('id, slug, cat_name');
        $this->db->from($table);        
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_gallery() {
        $this->db->select('id, name, category_id, image_file, url');
        $this->db->from('gallery');        
        $this->db->where('status', '1');        
        $query = $this->db->get()->result();        

        return $query;
    }

    public function get_single_user_client($id) {
        $this->db->select('client_name');
        $this->db->from('client');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();      

        return $query;
    }

    public function get_client_name($id){
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();        

        return $query;
    }

    public function get_info_by_slug($slug) {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->where('slug', $slug);
        $query = $this->db->get()->row(); 
        // echo $this->db->last_query(); exit;       

        return $query;
    }
    public function get_info_by_slug_of_product($slug) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('slug', $slug);
        $query = $this->db->get()->row(); 
        // echo $this->db->last_query(); exit;       

        return $query;
    }

    public function get_info_by_slug_of_services($slug) {
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('slug', $slug);
        $query = $this->db->get()->row(); 
        // echo $this->db->last_query(); exit;       

        return $query;
    }

    public function get_info_by_slug_of_news($slug) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('slug', $slug);
        $query = $this->db->get()->row(); 
        // echo $this->db->last_query(); exit;       

        return $query;
    }


    public function get_homepage_show($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 1);
        $this->db->where('display_home', 1);
        $this->db->limit(8);
        $query = $this->db->get()->result();        

        // dd($query);
        return $query;
    }

    public function get_footershow($table) {
        $this->db->select('name, slug');
        $this->db->from($table);
        $this->db->where('status', 1);
        $this->db->order_by("id", "desc");
        $this->db->limit(6);
        $query = $this->db->get()->result();        

        return $query;
    }

    function slug_exists($slug){
        $this->db->select('slug');
        $this->db->from('article');
        $this->db->where('slug',$slug);
        $this->db->limit(1);
        $query = $this->db->get();
        // echo $this->db->last_query(); exit;
        return ($query->num_rows()==1);
    }
    function service_exists($slug){
        $this->db->select('slug');
        $this->db->from('services');
        $this->db->where('slug',$slug);
        $this->db->limit(1);
        $query = $this->db->get();
        // echo $this->db->last_query(); exit;
        return ($query->num_rows()==1);
    }

}
