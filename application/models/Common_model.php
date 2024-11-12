<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query =  $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_info($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', 1);
        $query =  $this->db->get();
        return $query->row();
    }

    public function save($table, $data) {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($table, $id, $field, $data) {
        $this->db->where($field, $id);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function exists($table, $field, $item ) {
        $this->db->from($table);
        $this->db->where($field, $item);
        $query = $this->db->get();

        return ($query->num_rows() >= 1);
    }


    public function get_category_dd($table){
        $data[''] = '--- Select Category ---';
        $this->db->select('slug, cat_name');
        $this->db->from($table);
        $this->db->order_by('cat_name', 'ASC');
        $query = $this->db->get();

         foreach ($query->result_array() AS $rows) {
            $data[$rows['slug']] = $rows['cat_name'];
        }

        return $data;
    }

}
