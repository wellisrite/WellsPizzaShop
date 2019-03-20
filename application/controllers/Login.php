<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
                $this->load->view('header');
		$this->load->view('login');
                $this->load->view('footer');
	}
        function process(){
                $this->load->view('header');
                $this->load->model('users_model');
                $account=$this->users_model->get_user($this->input->post('id'))->row_array();
                if(md5($this->input->post('password'))==$account['password']) {
                    echo "login success";
                    session_start();
                    $_SESSION['id']=$account['id'];
                    $_SESSION['nama']=$account['nama'];
                    redirect('pizza');
                }
                else if($account['id']==""){
                    //echo "Wrong id,please insert valid id";
                    $data['notice']="wrong id,please insert valid id";
                    //redirect('login',$data);
                }
                else{
                    $data['notice']="wrong password,you have inputed the wrong password";
                    //redirect('login',$data);
                }
                $this->load->view('login',$data);
                $this->load->view('footer');
        }
    function user_info(){
        $this->load->view('header');
        $this->load->model('Transactions_model');
        $id=$_SESSION['id'];
        $data['orders']=$this->Transactions_model->getOrders($id)->result();
        $this->load->model('users_model');
        $this->load->model('pizza_model');
        $data['account']=$this->users_model->get_user($id)->row_array();
        $this->load->view('users',$data);
        $this->load->view('footer');
    }
    function confirmedbyUser(){
        $id=$this->uri->segment(3);
        $data=array(
                'status' => 'Delivered and confirmed by User'
            );
        $this->db->where('idT',$id);
        $this->db->update('ActiveOrders',$data);
        redirect('login/user_info');
    }
}
