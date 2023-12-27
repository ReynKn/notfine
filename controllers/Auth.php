<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'userrole');
  }

  public function index()
  {
    if($this->session->userdata('email')){
      redirect('Admin/');
    }
    $this->form_validation->set_rules('email', 'Email','trim|required|valid_email',[
      'valid_email' => 'Email Must Be Valid',
      'required' => 'Email Must Be Filled'
    ]);
    $this->form_validation->set_rules('password', 'Password','trim|required',[
      'required' => 'Password Must Be Filled'
    ]);
    if ($this->form_validation->run() == false){
      $this->load->view('layout/auth_header');
      $this->load->view('auth/login');
      $this->load->view('layout/auth_footer');
    } else {
      $this->cek_login();
    }
  }

  public function registrasi()
  {
    if ($this->session->userdata('email')){
      redirect('Dash');
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email Must Be Registered!',
      'valid_email' => 'Email Must Be Valid!',
      'required' => 'Email Must Be Filled',
    ]);

    $this->form_validation->set_rules(
      'password1','Password', 'required|trim|min_length[5]|matches[password2]',
      [
        'matches' =>'Repeat The Damn Password',
        'min_length' => 'Password is too short',
        'required' => 'Password Needs to be Fulfilled'
      ]
      );

    $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
    if($this->form_validation->run()==false){
      $data['judul'] = 'Registration';
      $this->load->view('layout/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('layout/auth_footer');
    } else {
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', ' true')),
        'email' => htmlspecialchars($this->input->post('email', ' true')),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'gambar' => 'default.jpg',
        'role' => "User",
        'date_created' => time()
      ];
      $this->userrole->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="Alert">Congratulations! Your Account has successfully 
      Registered, PLEASE LOGIN!</div>');
      redirect('auth');
    }
  }



  public function cek_login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if($user){
      if (password_verify($password, $user['password'])){
        $data = [
          'email' => $user['email'],
          'role' => $user['role'],
          'id' => $user['id'],
        ];
        $this->session->set_userdata($data);
        if ($user['role'] == 'Admin'){
          redirect('Admin/');
        } else {
          redirect('DashUser');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
        redirect('auth');
      }
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Registered Yet!</div>');
      redirect('auth');
    }
  }

  public function logout(){
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Logout!</div>');
    redirect('Auth');
  }
}
