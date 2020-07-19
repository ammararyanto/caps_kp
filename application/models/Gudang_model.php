<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang_model extends CI_Model

{
    public function getProductById($product_id)
    {
        $this->db->select();
        $this->db->from('product');
        $this->db->where('id', $product_id);
        return $this->db->get()->row_array();
    }

    public function inputChecklist($data)
    {
        $this->db->insert('checklist', $data);
    }

    public function getChecklist($product_id)
    {
        $this->db->select();
        $this->db->from('checklist');
        $this->db->where('id_product', $product_id);
        return $this->db->get()->result_array();
    }
}
