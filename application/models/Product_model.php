<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model

{
    public function getPlatform()
    {
        $query = "SELECT `product_platform`.*,`product`.`product`
        FROM `product_platform` JOIN `product`
        ON `product_platform`.`product_id` = `product`.`id`
        ORDER BY `id` ASC ";
        return $this->db->query($query)->result_array();
    }

    public function getAksesoris()
    {
        $query = "SELECT `product_accessories`.*,`product_platform`.`platform`,
        `product_platform`.`platform`,`product`.`product`
        FROM `product_accessories` 
        JOIN `product`
        ON `product_accessories`.`id_product` = `product`.`id`
        JOIN `product_platform`
        ON `product_accessories`.`id_platform` = `product_platform`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function getAksesorisById($id_aksesoris)
    {
        $this->db->select('*');
        $this->db->from('product_accessories');
        $this->db->where('id_aksesoris', $id_aksesoris);
        $this->db->join('product', 'product.id = product_accessories.id_product');
        $this->db->join('product_platform', 'product_platform.id = product_accessories.id_platform');
        return $query = $this->db->get()->row_array();
    }

    public function getProductbyId($id_platform)
    {
        $this->db->where('product_id', $id_platform);
        return $this->db->get('product_platform')->result_array();
    }
}
