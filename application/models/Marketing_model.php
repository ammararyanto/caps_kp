<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing_model extends CI_Model
{
    public function createBooking(
        $id_booking,
        $nama,
        $no_hp,
        $sosmed,
        $tgl_booking,
        $platform_id,
        $kerusakan_awal
    ) {

        $tangga_input = date('Y-m-d H:i:s', time());
        $data = [
            "id_booking"      => $id_booking,
            "nama"            => $nama,
            "device"          => $platform_id,
            "no_hp"           => $no_hp,
            "tanggal_input"   => $tangga_input,
            "tanggal_booking" => $tgl_booking,
            "kerusakan_awal"  => $kerusakan_awal,
            "status"          => 1,
            "sosmed"          => $sosmed
        ];


        $this->db->insert('booking', $data);
    }

    public function getBookingAll()
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->get()->result_array();
    }

    public function getBookingByTanggalBooking($tanggal_booking)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('tanggal_booking like', $tanggal_booking . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->get()->result_array();
    }

    public function getBookingByTanggalInputCount($tanggal_input)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('tanggal_input like', $tanggal_input . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function getBookingByTanggalInput($tanggal_input)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('tanggal_input like', $tanggal_input . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->get()->result_array();
    }

    public function getBookingByTanggalBookingCount($tanggal_booking)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('tanggal_booking like', $tanggal_booking . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function getBookingSulitDihubungi()
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('status between 2 and 3');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->get()->result_array();
    }

    public function getBookingSulitDihubungiCount()
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('status between 2 and 3');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function getBookingClosingHariIni($tanggal_selesai)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('status', 5);
        $this->db->where('tanggal_closing like', $tanggal_selesai . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->get()->result_array();
    }

    public function getBookingClosingHariIniCount($tanggal_selesai)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('no_booking', 'asc');
        $this->db->where('status', 5);
        $this->db->where('tanggal_closing like', $tanggal_selesai . '%');
        $this->db->join('status_booking', 'status_booking.id = booking.status');
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function getBookingDetail($id_booking)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('id_booking', $id_booking);
        $this->db->join('product_platform', 'product_platform.id = booking.device');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->row_array();
    }
}
