<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_proyeku extends CI_Model
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    public function getRecord($table, $param){
        $query = $this->db->get_where($table, $param);
        return $query->row();
    }
    
    public function getJumlah($table, $param){
        $this->db->where($param);
        $result = $this->db->count_all_results($table);
        return $result;
    }

    public function getAll($table){
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getAllWhere($table, $param){
        $query = $this->db->get_where($table, $param);
        return $query->result();
    }
    
    public function getLimited($table, $limit, $offset, $param){
        $this->db->limit($limit, $offset);
        $this->db->where($param);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getJoined($table1, $table2, $param, $con){
        $query = $this->db->query("SELECT * FROM $table1 INNER JOIN $table2 ON $param WHERE $con;");
        return $query->result();
    }

    public function addRecord($table, $value){
        $this->db->insert($table, $value);
    }

    public function updateRecord($table, $param, $value){
        $this->db->where($param);
        $this->db->update($table, $value);
    }

    public function deleteRecord($table, $param){
        $this->db->where($param);
        $this->db->delete($table);
    }
}