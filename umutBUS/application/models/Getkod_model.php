<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getkod_model extends CI_Model {

     function get_kodjad(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_zaman,3)) AS kd_max FROM tbl_zaman");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "J".$kd;
    }
    function get_kodtuj(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_terminal,3)) AS kd_max FROM tbl_varis");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "TJ".$kd;
    }
    function get_kodbus(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_otobus,3)) AS kd_max FROM tbl_otobus");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "B".$kd;
    }
    function get_kodtmporder(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_siparis,3)) AS kd_max FROM tbl_siparis");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "ORD".$kd;
    }
    function get_kodpel(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_musteri,3)) AS kd_max FROM tbl_musteri");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "CA".$kd;
    }
    function get_kodkon(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_onay,3)) AS kd_max FROM tbl_onay");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "KF".$kd;
    } 

    function get_kodadm(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_admin,3)) AS kd_max FROM tbl_admin");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "ADM".$kd;
    }

    function get_kodbank(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_bank,3)) AS kd_max FROM tbl_bank");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "BNK".$kd;
    }
}

