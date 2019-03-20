<?php 
class Admin extends ci_controller{
	function index(){
		session_start();
		if(isset($_SESSION['id'])){
		if($_SESSION['id']=='admin'){
			redirect('admin/dashboard');
			}
			else{
				redirect('pizza');
			}
		}
		else{
			redirect('pizza');
		}
	}	
	function showUserT(){
		$this->load->view('header');
		$this->load->model('transactions_model');
		$this->load->model('users_model');
		$this->load->model('pizza_model');
		$data['orders']=$this->transactions_model->getTransactionsU($_POST['id'])->result();
		$data['id']=$_POST['id'];
		$this->load->view('showTransactions',$data);
		$this->load->view('footer');
	}
	function showTdate(){
		$this->load->view('header');
		$this->load->model('transactions_model');
		$this->load->model('users_model');
		$this->load->model('pizza_model');
		$data['orders']=$this->transactions_model->getTransactionsD($_POST['sDate'],$_POST['eDate'])->result();
		$data['sDate']=$_POST['sDate'];
		$data['eDate']=$_POST['eDate'];
		$this->load->view('showTransactions',$data);
		$this->load->view('footer');
	}
	function dashboard(){
		$this->load->view('header');
		$this->load->model('shop_model');
		$status=$this->shop_model->getStatus();			
		if(isset($_SESSION['id'])){
		if($_SESSION['id']=='admin'){
				$this->load->model('pizza_model');
				$this->db->select()->from('tblTransactions')->order_by('status desc,idT')->where('status <>','on cart');
				$data['orders']=$this->db->get()->result();
				$data['status']=$status['status'];
				$this->load->model('users_model');
				$this->load->view('control',$data);
				$this->load->view('footer');
			}
			else{
			redirect('pizza');
			}
		}
		else{
		redirect('pizza');
		}	
	}
	function replenish(){
		$this->load->model('pizza_model');
		$data['pizza']=$this->pizza_model->list_products()->result();
		$this->load->view('header');
		$this->load->view('replenish',$data);
		$this->load->view('footer');
	}
	function replenish_save(){
		$this->load->model('pizza_model');
		$length=$this->input->post('length');
		for($i=0;$i<$length;$i++){
			$stock=$this->input->post('stock'.$i);
			$id=$this->input->post('kodeP'.$i);
			$data=array(
				'stock' => $stock
				);
			$this->db->where('kodeP',$id);
			$this->db->update('tblProducts',$data);
		}
		redirect('admin/dashboard');
	}
	function reset_ai(){
		$this->db->empty_table('tblTransactions');
		$sql="alter table tblTransactions AUTO_INCREMENT = 1;";
		$this->db->query($sql);
		redirect('admin');
	}
	function send_order(){
		$id=$this->uri->segment(3);
		$data=array(
				'status' => 'Sending'
			);
		$this->db->where('idT',$id);
		$this->db->update('tblTransactions',$data);
		redirect('admin');
	}
	function cancel_order(){
		$id=$this->uri->segment(3);
		$data=array(
				'status' => 'Canceled'
			);
		$this->db->where('idT',$id);
		$this->db->update('tblTransactions',$data);
		redirect('admin');	
	}
	function confirm_delivery(){
		$id=$this->uri->segment(3);
		$data=array(
				'status' => 'Delivered'
			);
		$this->db->where('idT',$id);
		$this->db->update('tblTransactions',$data);
		redirect('admin');
	}
	function delete_order(){
		$id=$this->uri->segment(3);
		$this->db->where('idT',$id);
		$this->db->delete('tblTransactions');
		redirect('admin');
	}
	function force_open(){
		$data=array(
			'status' => "forced open"
			);
		$this->db->where('id',1);
		$this->db->update('shopstatus',$data);
		redirect('admin');
	}
	function force_close(){
		$data=array(
			'status' => "force closed"
			);
		$this->db->where('id',1);
		$this->db->update('shopstatus',$data);
		redirect('admin');
	}
	function default_status(){
		$data=array(
			'status' => "default"
			);
		$this->db->where('id',1);
		$this->db->update('shopstatus',$data);
		redirect('admin');
	}
	function edit_product(){
		$this->load->view('header');
		$this->load->view('edit');
		$this->load->view('footer');
	}
}
 ?>
