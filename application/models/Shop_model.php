<?php 
	class Shop_model extends ci_model{
		function getStatus(){
			$status=$this->db->get('shopstatus');
			return $status->row_array();
		}
	}
 ?>