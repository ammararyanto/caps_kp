<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_model extends CI_Model
{
    public function getjudul()
    {
        return $this->db->get('seo_jajal');
    }
    public function getBookingTodayCount()
    {
        $today = date('Y-m-d');
        $this->db->select('COUNT(*)total');
        $this->db->from('web_booking');
        $this->db->like('date_Wbooking', $today);

        return $this->db->count_all_results();
    }

    public function getProvince()
    {
        $this->db->select('*');
        $this->db->from('provinces');
        return $this->db->get()->result_array();
    }

    public function getRegenciesByProvincies($provincies_id)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $provincies_id);
        return $this->db->get()->result_array();
    }

    public function getDistricsByRegencies($regencies_id)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('regency_id', $regencies_id);
        return $this->db->get()->result_array();
    }

    public function getVillagesByDistricts($districts_id)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $districts_id);
        return $this->db->get()->result_array();
    }

    public function getDevice()
    {
        $this->db->select('*');
        $this->db->from('product');
        return $this->db->get()->result_array();
    }

    public function getModelByDevice($device)
    {
        $this->db->select('*');
        $this->db->from('product_platform');
        $this->db->where('product_id', $device);
        return $this->db->get()->result_array();
    }

    public function getFormPengririman($id_kirim)
    {
        $this->db->select('*');
        $this->db->from('kirim_servis');
        $this->db->where('id_kirim', $id_kirim);
        $this->db->join('product_platform', 'product_platform.id=kirim_servis.device_model');
        $this->db->join('product', 'product.id=product_platform.product_id');
        $this->db->join('villages', 'villages.id=kirim_servis.village_pengirim');
        $this->db->join('districts', 'districts.id=villages.district_id');
        $this->db->join('regencies', 'regencies.id=districts.regency_id');
        $this->db->join('provinces', 'provinces.id=regencies.province_id');
        return $this->db->get()->row_array();
    }

    public function cariNota($cari_nota)
    {
        $cari_nota = $this->input->post('cari_nota', true);
        $this->db->where('id_transaksi', $cari_nota);
        $this->db->select('*');
        $this->db->from('log_transaksi');
        $this->db->join('status_pembayaran', 'status_pembayaran.id=log_transaksi.sPembayaran');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=log_transaksi.sPengerjaan');
        $this->db->join('user', 'user.id=log_transaksi.id_user');
        return $this->db->get()->result_array();
    }

    public function getNotaByID($id_Transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_Transaksi);
        $this->db->join('user', 'user.id=transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->row_array();
    }
    
    public function tampil_data()
    {
    return $this->db->get('seo_jajal');
    }

}
