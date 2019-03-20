<?php
class Register extends CI_Controller{
    function index(){
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }
    function process(){
        $this->load->model('users_model');
        $account=$this->users_model->get_user($this->input->post('id'))->row_array();
        if($account['id']!=""){
            $this->load->view('header');
            $data['noticer']="The user id has been taken please choose another id name";
            $this->load->view('register',$data);
            $this->load->view('footer');
        }
        else{
        $account=array(
          'id'  => $this->input->post('id'),
          'password' => md5($this->input->post('password')),
          'nama' => $this->input->post('fname'),
          'gender' => $this->input->post('gender'),
          'alamat' => $this->input->post('address'),
          'email'  => $this->input->post('email')
        );
        $this->db->insert('tblUsers',$account);
        echo "Register Success";
        redirect('login');
      }
    }
}

