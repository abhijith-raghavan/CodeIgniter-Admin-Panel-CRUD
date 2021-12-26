<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_Model extends CI_Model {

    function fetch_data()
    {  
        $query = $this->db->get_where('files', array('file_status'=>'1'));
        return $query;
    }
    function fetch_trash_data()
    {
        $query = $this->db->get_where('files', array('file_status'=>'0'));
        return $query;
    }
    function save_file($parameters) {
        $inputTitle     =    $parameters['inputTitle'];
        $fileext        =   $parameters['filetype'];
        $filename        =    $parameters['filename'];  

        $data=array(
            'file_title'  =>  $inputTitle,
            'file_name'  =>  $filename,
            'file_type' => $fileext,
            'file_status' => '1'
            );
          $this->db->insert('files',$data);
    }
    function delete_file($id){
        date_default_timezone_set('Asia/Karachi');
        $now = date('Y-m-d H:i:s');
        $data = array(
            'file_deletetime'  =>  $now,
            'file_status'  =>  '0'
        );
        $this->db->where('id', $id);
        $this->db->update('files', $data); 
      }

    function fetch_single_item($id){
        $query = $this->db->get_where('files', array('id'=>$id));
        return $query;
    }
}