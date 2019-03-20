<?php 
	class Message extends ci_controller(
			function input(){
				$id=$this->uri->segment(3);
				$data=array(
						'idM' => null,
						'id' => $id,
						'email' => $this->input->post('email'),
						'messagetype' => $this->input->post('type'),
						'comment' => $this->input->post('message')
					);
				$this->db->insert('message',$data);
				redirect('contact');
			}
		)
 ?>