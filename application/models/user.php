<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
	public function __construct() {
		parent::__construct();	
	}

	public function isExsits($table = null, $conditions = array()){
		if($table != null){
			$total = $this->db->where($conditions)
							  ->count_all_results($table);
			if($total == 1) {
				return true;
			}								
		}
		return false;
	}
	
	   public function AdduserData($table ,$data)
	      {
		   $this->db->insert($table, $data);
		//  echo $this->db->last_query();
		  return  $this->db->insert_id();
		  }
		  
		  public function updateDetails($where,$table,$data)
		  {
			 $this->db->where($where);
             $this->db->update($table, $data); 
		  }
		  public function deletedata($where,$table)
		  {
			 $this->db->where($where);
             $this->db->delete($table); 
		  }
		
		
}

