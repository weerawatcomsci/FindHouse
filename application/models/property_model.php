<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property_model extends CI_Model {

    public $table_name = 'property';
    public function getedataproperty(){
      $query = $this->db->query('SELECT * FROM property');
          if($query->num_rows()>0){
              return $query->result();
            } else {
              return array();
              }

    }
    public function insertprop($dataproperty){

  		$simpan_data = $this->db->insert($this->table_name,$dataproperty);
  		return $simpan_data;
    }

  public function getRows($id = ''){
  $this->db->select('Image');
  $this->db->from('property');
  if($id){
    $query = $this->db->get();
    $result = $query->row_array();
  }else{
    $query = $this->db->get();
    $result = $query->result_array();
  }
  return !empty($result)?$result:false;
}

public function insert($data = array()){
  $insert = $this->db->insert_batch('property',$data);
  return $insert?true:false;
}

public function fetch_data_property(){
  $this->db->order_by('created');
  // $this->db->limit($limit, $start);
  $query = $this->db->get('property');
  if($query->num_rows()>0){
      foreach ($query->result() as $row){
         $rs[]=$row;
      }
        return $rs;
  }else{
    return array();
  }
}



 }
