<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model

{
    public function getServiceProduct($product, $catgory_id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('category_id', $catgory_id);
        $this->db->where('product_id', $product);
        $this->db->where('publish', 1);
        $this->db->order_by('date_created', 'DESC');
        $this->db->join('blog_category', 'blog_category.id=blog.category_id');
        $this->db->join('product', 'product.id=blog.product_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJumlahService($product, $catgory_id)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('category_id', $catgory_id);
        $this->db->where('product_id', $product);
        $this->db->where('publish', 1);
        $this->db->order_by('date_created', 'DESC');
        $this->db->join('blog_category', 'blog_category.id=blog.category_id');
        $this->db->join('product', 'product.id=blog.product_id');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function getBlogRecent()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('category_id =', 1);
        $this->db->order_by('date_created', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCategoryId($category)
    {
        $this->db->select('*');
        $this->db->from('blog_category');
        $this->db->like('category', $category);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getBlogByID($blog_id)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('id', $blog_id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
