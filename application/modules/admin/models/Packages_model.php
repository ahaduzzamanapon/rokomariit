<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data() {
        // count query
        $this->db->select('*');
        $this->db->from('packages');
        $query = $this->db->get()->result();

        return $query;
    }

    public function get_info($id) {
        $query = $this->db->from('packages')
                        ->where('id', $id)
                        ->get()->row();
        return $query;
    }

    function delete($id) {
        $img_path = 'service_img/';
        $img_path_icon = 'service_img/icon_img/';
        $info = $this->get_info($id);

        if(!empty($info->image_file)){
           unlink($img_path.$info->image_file);
           // @unlink($img_path_thumbs.$info->image_file);
        }
        if(!empty($info->fa_icon)){
            unlink($img_path_icon.$info->fa_icon);
            // @unlink($img_path_thumbs.$info->image_file);
         }

        $this->db->where('id', $id);
        $this->db->delete('packages');
        
        return TRUE;
    }

    function delete_img($id) {
        // $img_path = realpath(APPPATH . '../service_img/');
        $img_path = 'service_img/';
        $info = $this->get_info($id);
// print_r(!empty($info->image_file)); exit;
        if(!empty($info->image_file)){
            // print('Service img deleted'); exit;
           unlink($img_path.$info->image_file);
        //    print('Service img deleted'); exit;
        }
        
        return TRUE;
    }
    function delete_img_icon($id) {

        // $img_path = realpath(APPPATH . '../service_img/icon_img/');
        $img_path = 'service_img/icon_img/';
        $info = $this->get_info($id);

        if(!empty($info->fa_icon)){
           unlink($img_path.$info->fa_icon);
                // print('Service img deleted'); exit;
        }
        
        return TRUE;
    }

}
