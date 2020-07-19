<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_model extends CI_Model
{
    public function getStok()
    {
        $query = "SELECT `stok`.*,`tipe_penjualan`.*
        FROM `stok` 
        JOIN `tipe_penjualan`
        ON `stok`.`id_tipepenjualan` = `tipe_penjualan`.`id_tipepenjualan` 
        WHERE `stok_barang` > 0";
        return $this->db->query($query)->result_array();
    }

    public function getStokAll()
    {
        $query = "SELECT `stok`.*,`tipe_penjualan`.*
        FROM `stok` 
        JOIN `tipe_penjualan`
        ON `stok`.`id_tipepenjualan` = `tipe_penjualan`.`id_tipepenjualan`";
        return $this->db->query($query)->result_array();
    }

    public function getStokGaji()
    {
        $this->db->select('id_barang,nama_barang,fee_teknisi');
        $this->db->from('stok');
        $this->db->order_by('fee_teknisi', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getStokByID($id_barang)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->where('id_barang', $id_barang);
        $this->db->join('tipe_penjualan', 'tipe_penjualan.id_tipepenjualan = stok.id_tipepenjualan');
        return $query = $this->db->get()->row_array();
    }

    public function updateStok($id_stok, $stok)
    {
        $data = ["stok_barang" => $stok];
        $this->db->where('id_barang', $id_stok);
        $this->db->update('stok', $data);
    }

    public function getStokByTransaksiPenjualan($query, $tipe_penjualan)
    {
        $this->db->select('*');
        $this->db->where('id_tipepenjualan', $tipe_penjualan);
        $this->db->where('stok_barang >', 0);
        $this->db->limit(20);
        $this->db->from('stok');
        if ($query != '') {
            $this->db->like('nama_barang', $query);
            $this->db->or_like('id_barang', $query);
            $this->db->where('stok_barang >', 0);
        }
        return $this->db->get();
    }

    public function getStokBarang($id_barang)
    {
        $this->db->select();
        $this->db->where('id_barang', $id_barang);
        $this->db->from('stok');
        return $this->db->get()->row()->stok_barang;
    }

    public function updateStokBerkurang($id_barang, $stok_awal, $stok_ambil)
    {
        $stok_update = $stok_awal - $stok_ambil;

        $this->db->set('stok_barang', $stok_update);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('stok');
    }

    public function getBarangCanceled($id_detail_transaksi)
    {
        $this->db->select('id, id_barang, quantity');
        $this->db->from('transaksi_detail');
        $this->db->where('id', $id_detail_transaksi);

        return $this->db->get()->row_array();
    }

    public function updateStokBertambah($id_barang, $stok_awal, $stok_kembali)
    {
        $stok_update = $stok_awal + $stok_kembali;

        $this->db->set('stok_barang', $stok_update);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('stok');
    }


    public function getStokTipe($id_tipepenjualan)
    {
        $this->db->select('id_barang,nama_barang,id_tipepenjualan,stok_barang');
        $this->db->from('stok');
        $this->db->where('id_tipepenjualan', $id_tipepenjualan);
        return $this->db->get()->result_array();
    }
}
