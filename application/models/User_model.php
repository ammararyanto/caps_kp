<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getWhoComment($id_Tcomment)
    {
        $this->db->select('id_Wcomment,id_Tcomment');
        $this->db->from('who_comment');
        $this->db->where('id_Tcomment', $id_Tcomment);
        return $this->db->get()->row_array();
    }

    public function belumKomen($id_user, $id_transaksi)
    {
        $this->db->select('id_parent,id_transaksi,id_sender');
        $this->db->from('transaksi_checklist');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->where('id_sender', $id_user);
        return $this->db->get()->row_array();
    }

    public function getId_commenter($checkdataid)
    {
        $this->db->select('id_parent,id_transaksi,id_sender');
        $this->db->from('transaksi_checklist');
        $this->db->where('id_transaksi', $checkdataid);
        $this->db->distinct('id_sender');
        return $this->db->get()->result_array();
    }

    public function notif_Comment($id_transaksi, $id_user)
    {
        $this->db->select('id_TrnsCmnt,id_UComment');
        $this->db->from('notif_comment');
        $this->db->where('id_TrnsCmnt', $id_transaksi);
        $this->db->where('id_UComment', $id_user);
        return $this->db->get()->row_array();
    }

    public function hitungNotifikasi($userid)
    {
        $this->db->select('*');
        $this->db->from('notif_comment');
        $this->db->where('id_UComment', $userid);
        $this->db->where('notif_read !=', 1);
        $this->db->distinct('id_TrnsCmnt');
        return $this->db->count_all_results();
    }

    public function getNotif($userid)
    {
        $this->db->select(
            'notif_comment.id_Ncomment,
            notif_comment.id_UComment,
            notif_comment.notif_read,
            notif_comment.id_TrnsCmnt,
            notif_comment.NR_dateupdate,
            pelanggan.nama_pelanggan'
        );
        $this->db->join('transaksi', 'transaksi.id_transaksi = notif_comment.id_TrnsCmnt');
        $this->db->join('pelanggan', 'pelanggan.id_member=transaksi.id_pelanggan');
        $this->db->from('notif_comment');
        $this->db->where('id_UComment', $userid);
        $this->db->where('notif_read !=', 1);
        $this->db->distinct('id_TrnsCmnt');
        $this->db->limit('5');
        $this->db->order_by('NR_dateupdate', 'DESC');
        return $this->db->get()->result_array();
    }
}
