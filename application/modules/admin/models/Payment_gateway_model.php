<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_gateway_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all records
    public function get_all()
    {
        return $this->db->get('bkash_payment_gateway')->result();
    }

    // Insert data
    public function insert($data)
    {
        return $this->db->insert('bkash_payment_gateway', $data);
    }

    // Get single record by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('bkash_payment_gateway', array('id' => $id))->row();
    }

    // Update record
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('bkash_payment_gateway', $data);
    }

    // Delete record
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('bkash_payment_gateway');
    }
}
