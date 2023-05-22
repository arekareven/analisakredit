<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_calendar extends CI_Model {

	function __construct() { 
        // Set table name 
        $this->table = 'pengajuan'; 
    } 
     
    /* 
     * Fetch event data from the database 
     * @param array filter data based on the passed parameters 
     */ 
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id_pengajuan", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id_pengajuan'])){ 
                    $this->db->where('id_pengajuan', $params['id_pengajuan']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('waktu_zoom', 'asc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
     
    /* 
     * Fetch and group by events based on waktu_zoom 
     * @param array filter data based on the passed parameters 
     */ 
    function getGroupCount($params = array()){ 
        $this->db->select("waktu_zoom, COUNT(id_pengajuan) as event_num"); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("where_year", $params)){ 
            $this->db->where("YEAR(waktu_zoom) = ".$params['where_year']); 
        } 
         
        if(array_key_exists("where_month", $params)){ 
            $this->db->where("MONTH(waktu_zoom) = ".$params['where_month']); 
        } 
         
        $this->db->group_by('waktu_zoom'); 
         
        $query = $this->db->get(); 
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
         
        // Return fetched data 
        return $result; 
    } 

}

