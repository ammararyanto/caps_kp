<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nota_model extends CI_Model
{
    public function notaBelumDiambil()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan <', 7);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pembayaran', 'status_pembayaran.id=transaksi.status_pembayaran');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function notaCancelDone()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan > ', 4);
        $this->db->where('stasus_pengerjaan < ', 99);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pembayaran', 'status_pembayaran.id=transaksi.status_pembayaran');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function notaDiambil()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan between 7 and 99');
        $this->db->order_by('tanggal_diambil', 'DESC');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pembayaran', 'status_pembayaran.id=transaksi.status_pembayaran');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getServisHariIniByPengerjaan($sPengerjaan)
    {
        $rowList = 'log_transaksi.*,transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('log_transaksi');
        $this->db->where('log_transaksi.sPengerjaan =', $sPengerjaan);
        $this->db->order_by('log_transaksi.id_transaksi', 'asc');
        $this->db->like('tanggal_selesai', date('Y-m-d', time()));
        $this->db->distinct('transaksi.id_transaksi');
        $this->db->join('transaksi', 'transaksi.id_transaksi=log_transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getAllStatusPengerjaan()
    {
        $this->db->select('*');
        $this->db->from('status_pengerjaan');
        return $query = $this->db->get()->result_array();
    }

    // model tidak terpakai lagi
    public function getAllServisByTeknisi($id_teknisi)
    {
        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getAllRiwayatServisByTeknisi($id_teknisi, $timeStart, $timeEnd)
    {
        $tsStart = strtotime($timeStart);
        $fixStart = date('Y-m-d H:i:s', $tsStart);

        $tsEnd = strtotime($timeEnd);
        $dtEnd = date('Y-m-d H:i:s', $tsEnd);
        $tanggalEnd = substr($dtEnd, 0, -9);
        $fixEnd = $tanggalEnd . ' 23:59:00';

        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->where('stasus_pengerjaan between 5 and 8');
        $this->db->where('tanggal_selesai between "' . $fixStart . '" and "' . $fixEnd . '"');
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getRiwayatServisanByPengerjaan($sPengerjaan, $id_teknisi, $timeStart, $timeEnd)
    {
        $tsStart = strtotime($timeStart);
        $fixStart = date('Y-m-d H:i:s', $tsStart);

        $tsEnd = strtotime($timeEnd);
        $dtEnd = date('Y-m-d H:i:s', $tsEnd);
        $tanggalEnd = substr($dtEnd, 0, -9);
        $fixEnd = $tanggalEnd . ' 23:59:00';

        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        $this->db->where('tanggal_selesai between "' . $fixStart . '" and "' . $fixEnd . '"');
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getServisanByStatusKepala($sPengerjaan, $id_teknisi, $timeStart, $timeEnd)
    {
        $tsStart = strtotime($timeStart);
        $fixStart = date('Y-m-d H:i:s', $tsStart);

        $tsEnd = strtotime($timeEnd);
        $dtEnd = date('Y-m-d H:i:s', $tsEnd);
        $tanggalEnd = substr($dtEnd, 0, -9);
        $fixEnd = $tanggalEnd . ' 23:59:00';

        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        if ($sPengerjaan <= 4) {
            $this->db->where('tanggal_taransaksi between "' . $fixStart . '" and "' . $fixEnd . '"');
        } elseif ($sPengerjaan == 5 || $sPengerjaan == 6) {
            $this->db->where('tanggal_selesai between "' . $fixStart . '" and "' . $fixEnd . '"');
        } else {
            $this->db->where('tanggal_diambil between "' . $fixStart . '" and "' . $fixEnd . '"');
        }
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getAllServisByTeknisiCount($sPengerjaan, $id_teknisi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_teknisi', $id_teknisi);
        $this->db->where('stasus_pengerjaan', $sPengerjaan);
        return $this->db->count_all_results();
    }

    public function getAllServisanTeknisi($sPengerjaan, $id_teknisi)
    {
        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        //$this->db->where('tanggal_selesai between ' . $timeStart . ' and' . $timeEnd);
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getAllServisanTeknisiOper($id_teknisi)
    {
        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan between 2 and 4');
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getAllServisanTeknisiCount($sPengerjaan, $id_teknisi, $timeStart, $timeEnd)
    {
        $tsStart = strtotime($timeStart);
        $fixStart = date('Y-m-d H:i:s', $tsStart);

        $tsEnd = strtotime($timeEnd);
        $dtEnd = date('Y-m-d H:i:s', $tsEnd);
        $tanggalEnd = substr($dtEnd, 0, -9);
        $fixEnd = $tanggalEnd . ' 23:59:00';

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        $this->db->where('id_teknisi', $id_teknisi);
        if ($sPengerjaan == 5 || $sPengerjaan == 6 || $sPengerjaan == 7 || $sPengerjaan == 8) {
            $array = array(
                'tanggal_selesai <= ' => $fixEnd,
                'tanggal_selesai >= ' => $fixStart
            );
        } else {
            $start = strtotime($timeStart);
            $end = strtotime($timeEnd);
            $array = array(
                'tanggal_taransaksi <= ' => $fixEnd,
                'tanggal_taransaksi >= ' => $fixStart
            );
        }

        return $this->db->where($array)->count_all_results();
    }


    public function getNamaTeknisi($id_teknisi)
    {
        $this->db->select();
        $this->db->where('id', $id_teknisi);
        $this->db->from('user');
        return $this->db->get()->row()->name;
    }

    public function getAwalBulan()
    {
        $hariIni = date('Ymd', time());
        $tahun = substr($hariIni, 0, -4);
        $bulan = substr($hariIni, 4, -2);
        $tanggal = substr($hariIni, 6);

        if ($tanggal < 6) {
            $bulan = $bulan - 1;
        }

        $tgl1 = $tahun . $bulan . '06';
        return $tgl1;
    }

    public function getAkhirBulan()
    {
        $hariIni = date('Ymd', time());
        $tahun = substr($hariIni, 0, -4);
        $bulan = substr($hariIni, 4, -2);
        $tanggal = substr($hariIni, 6);

        if ($tanggal < 6) {
            $bulan = $bulan - 1;
        }

        if ($bulan >= 12) {
            $tahun++;
            $bulan = '01';
        } else {
            $bulan++;
            if ($bulan < 10) {
                $bulan = '0' . $bulan;
            }
        }

        $tgl2 = $tahun . $bulan . '05';
        return $tgl2;
    }

    public function getSelesaiHariIniById($id_teknisi)
    {
        $tgl = date('Y-m-d', time());
        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('tanggal_selesai like', $tgl . '%');
        $this->db->where('id_teknisi', $id_teknisi);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function servisHariIniCountByStatus($sPengerjaan)
    {
        $tgl = date('Ymd', time());
        $this->db->select('*');
        $this->db->from('log_transaksi');
        $this->db->where('sPengerjaan =', $sPengerjaan);
        return $this->db->get()->result_array();
    }

    public function updateTanggalSelesai($id_Transaksi)
    {
        $dateTimeSelesai = date('Y-m-d H:i:s', time());
        $this->db->set('tanggal_selesai', $dateTimeSelesai);
        $this->db->where('id_transaksi', $id_Transaksi);
        $this->db->update('transaksi');
    }

    public function getAllUser()
    {
        $this->db->select('id, name');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function getAllTeknisi()
    {
        $this->db->select('id,name,image');
        $this->db->from('user');
        $where = '(role_id="1" or role_id="9")';
        return $this->db->where($where)->get()->result_array();
    }

    public function getTransaksiSelesaiByDateCount($tanggalSelesai)
    {
        $tahun = substr($tanggalSelesai, 0, -4);
        $bulan = substr($tanggalSelesai, 4, -2);
        $tanggal = substr($tanggalSelesai, 6);

        $sPengerjaan = array(5, 7);
        $waktu = $tahun . '-' . $bulan . '-' . $tanggal;
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where_in('stasus_pengerjaan', $sPengerjaan);
        $this->db->where('tanggal_selesai like', $waktu . '%');
        return $this->db->count_all_results();
    }

    public function getTransaksiBatalByDateCount($tanggalSelesai)
    {
        $tahun = substr($tanggalSelesai, 0, -4);
        $bulan = substr($tanggalSelesai, 4, -2);
        $tanggal = substr($tanggalSelesai, 6);

        $sPengerjaan = array(6, 8);
        $waktu = $tahun . '-' . $bulan . '-' . $tanggal;
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where_in('stasus_pengerjaan', $sPengerjaan);
        $this->db->where('tanggal_selesai like', $waktu . '%');
        return $this->db->count_all_results();
    }

    public function getTransaksiMasukByDateCount($tanggalMasuk)
    {
        $tahun = substr($tanggalMasuk, 0, -4);
        $bulan = substr($tanggalMasuk, 4, -2);
        $tanggal = substr($tanggalMasuk, 6);
        $waktu = $tahun . '-' . $bulan . '-' . $tanggal;

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('tanggal_taransaksi like', $waktu . '%');
        return $this->db->count_all_results();
    }

    public function getTransaksiAmbilByDateCount($tanggalMasuk)
    {
        $tanggalMasukCon = substr(strtotime($tanggalMasuk), 0, -5);
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('tanggal_diambil like', $tanggalMasukCon . '%');
        return $this->db->count_all_results();
    }

    public function getServisanSelesaiTeknisiByDateCount($id_teknisi, $tanggalSelesai)
    {
        $tahun = substr($tanggalSelesai, 0, -4);
        $bulan = substr($tanggalSelesai, 4, -2);
        $tanggal = substr($tanggalSelesai, 6);

        $waktu = $tahun . '-' . $bulan . '-' . $tanggal;
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_teknisi =', $id_teknisi);
        $this->db->where('tanggal_selesai like', $waktu . '%');
        $this->db->where('stasus_pengerjaan =', 5);
        return $this->db->count_all_results();
    }

    public function getNotaAll()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('tanggal_diambil', 'DESC');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pembayaran', 'status_pembayaran.id=transaksi.status_pembayaran');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function getNotaDiambil()
    {
        $this->db->select('grand_total,tanggal_diambil');
        $this->db->from('transaksi');
        $this->db->where('status_pembayaran', 99);
        return $this->db->get()->result_array();
    }

    public function getNota()
    {
        $this->db->select('tanggal_taransaksi');
        $this->db->from('transaksi');
        $this->db->limit(1000);
        return $this->db->get()->result_array();
    }

    public function servisBelumDikerjakan($sPengerjaan)
    {
        $rowList = 'transaksi.*, status_pengerjaan.sPengerjaan, pelanggan.nama_pelanggan, user.name, product.product, product_platform.platform ';
        $this->db->select($rowList);
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('user', 'user.id = transaksi.id_teknisi');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->result_array();
    }

    public function servisBelumDikerjakanCount($sPengerjaan)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan =', $sPengerjaan);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function notaBelumDiambilCount()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('stasus_pengerjaan > ', 4);
        $this->db->where('stasus_pengerjaan < ', 99);
        $this->db->order_by('id_transaksi', 'asc');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $this->db->count_all_results();
    }

    public function getNotaByID($id_Transaksi)
    {
        $this->db->select('transaksi.*, user.name, user.id , pelanggan.nama_pelanggan, pelanggan.alamat, pelanggan.no_hp , status_pengerjaan.sPengerjaan , product_platform.* , product.*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_Transaksi);
        $this->db->join('user', 'user.id=transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('status_pengerjaan', 'status_pengerjaan.id=transaksi.stasus_pengerjaan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->row_array();
    }

    public function getNotaCancel()
    {
        $this->db->select('tanggal_diambil,status_pembayaran');
        $this->db->from('transaksi');
        $this->db->where('status_pembayaran >', 1);
        $this->db->where('status_pembayaran <', 99);
        return $this->db->get()->result_array();
    }

    public function getTransaksiCheckListId($id_transaksi)
    {
        $this->db->select('transaksi_checklist.*, user.id, user.name, user.image');
        $this->db->from('transaksi_checklist');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->join('user', 'user.id=transaksi_checklist.id_sender');
        return $this->db->get()->row_array();
    }

    public function inputKomentar($data)
    {
        $this->db->insert('transaksi_checklist', $data);
    }

    public function getKomentar($id_komentar)
    {
        $this->db->select('*');
        $this->db->from('transaksi_checklist');
        $this->db->where('id_komentar', $id_komentar);
        return $this->db->get()->row_array();
    }

    public function getKomentarAllId($id_komentar)
    {
        $this->db->select('transaksi_checklist.*, user.name, user.id');
        $this->db->from('transaksi_checklist');
        $this->db->where('id_parent', $id_komentar);
        $this->db->order_by('id_komentar', 'asc');
        $this->db->join('user', 'user.id=transaksi_checklist.id_sender');
        return $this->db->get()->result_array();
    }

    public function getDetailTransaksiById($id_Transaksi)
    {
        $this->db->select('stok.nama_barang, transaksi_detail.status, transaksi_detail.id, transaksi_detail.id_barang, transaksi_detail.harga, transaksi_detail.quantity, transaksi_detail.total_harga, user.name');
        $this->db->from('transaksi_detail');
        $this->db->where('id_transakasi', $id_Transaksi);
        $this->db->join('stok', 'stok.id_barang = transaksi_detail.id_barang');
        $this->db->join('user', 'user.id = transaksi_detail.id_teknisi');
        return $this->db->get()->result_array();
    }

    public function getDetailTransaksiByIdSelesai($id_Transaksi)
    {
        $this->db->select('stok.nama_barang, transaksi_detail.status, transaksi_detail.id, transaksi_detail.id_barang, transaksi_detail.harga, transaksi_detail.quantity, transaksi_detail.total_harga, user.name');
        $this->db->from('transaksi_detail');
        $this->db->where('id_transakasi', $id_Transaksi);
        $this->db->where('status', 1);
        $this->db->join('stok', 'stok.id_barang = transaksi_detail.id_barang');
        $this->db->join('user', 'user.id = transaksi_detail.id_teknisi');
        return $this->db->get()->result_array();
    }

    public function getDetailTransaksiByIdCancel($id_Transaksi)
    {
        $this->db->select('stok.nama_barang, transaksi_detail.status, transaksi_detail.id, transaksi_detail.id_barang, transaksi_detail.harga, transaksi_detail.quantity, transaksi_detail.total_harga, user.name');
        $this->db->from('transaksi_detail');
        $this->db->where('id_transakasi', $id_Transaksi);
        $this->db->where('status', 0);
        $this->db->join('stok', 'stok.id_barang = transaksi_detail.id_barang');
        $this->db->join('user', 'user.id = transaksi_detail.id_teknisi');
        return $this->db->get()->result_array();
    }


    public function getDetailTransaksiCount($id_Transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi_detail');
        $this->db->where('id_transakasi', $id_Transaksi);
        return $this->db->count_all_results();
    }

    public function deleteDetailTransaksiByID($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi_detail');
    }

    public function updateStatusDetailTransaksi($id_detailTransaksi, $status_detailTransaksi, $id_teknisi)
    {
        $this->db->set('status', $status_detailTransaksi);
        $this->db->set('id_teknisi', $id_teknisi);
        $this->db->where('id', $id_detailTransaksi);
        $this->db->update('transaksi_detail');
    }

    public function createLogPengerjaan(
        $id_transaksi,
        $datetime,
        $pembayaran,
        $sPengerjaan,
        $teknisi
    ) {
        $data = [
            "id" => '',
            "id_transaksi"      => $id_transaksi,
            "datetime"          => $datetime,
            "sPembayaran"       => $pembayaran,
            "sPengerjaan"       => $sPengerjaan,
            "id_user"           => $teknisi
        ];
        $this->db->insert('log_transaksi', $data);
    }

    public function logPengerjaan(
        $id_transaksi,
        $datetime,
        $pembayaran,
        $sPengerjaan,
        $teknisi
    ) {
        $data = [
            "id" => '',
            "id_transaksi"      => $id_transaksi,
            "datetime"          => $datetime,
            "sPembayaran"       => $pembayaran,
            "sPengerjaan"       => $sPengerjaan,
            "id_user"           => $teknisi
        ];
        $this->db->insert('log_transaksi', $data);

        $transaksi = [
            "stasus_pengerjaan" => $sPengerjaan,
            "id_teknisi"        => $teknisi
        ];

        if ($sPengerjaan == 2) {
            $transaksi = [
                "stasus_pengerjaan" => $sPengerjaan,
                "id_teknisi"        => $teknisi
            ];
        } elseif ($sPengerjaan == 3) {
            $transaksi = [
                "stasus_pengerjaan" => $sPengerjaan,
                "id_user"        => $teknisi
            ];
        } elseif ($sPengerjaan == 4) {
            $transaksi = [
                "stasus_pengerjaan" => $sPengerjaan,
                "id_teknisi"        => $teknisi
            ];
        }

        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $transaksi);

        if ($sPengerjaan == 4) {
            $detailtransaksi = [
                "id_teknisi"        => $teknisi
            ];

            $this->db->where('id_transakasi', $id_transaksi);
            $this->db->update('transaksi_detail', $detailtransaksi);
        } else {
        }
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

    public function performace()
    {
        $this->db->select('id_teknisi');
        $this->db->distinct();
        $this->db->from('transaksi_detail');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getDetailByTeknisi($teknisi)
    {
        $this->db->select();
        $this->db->from('transaksi_detail');
        $this->db->where('id_teknisi', $teknisi);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getTeknisiByID($id_teknisi)
    {
        $this->db->select('name,id,image');
        $this->db->where('id', $id_teknisi);
        $this->db->from('user');
        return $this->db->get()->row_array();
    }
}
