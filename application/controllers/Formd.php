<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]

class Formd extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Formd_model');
  }

  public function tambahF()
  {
    $data['judul'] = "Halaman Tambah Data Peliharaan";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['formd'] = $this->Formd_model->get();
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
      'required' => 'Nama Lengkap is Required'
    ]);
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
      'required' => 'Tanggal is Required'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin is Required'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required', [
      'required' => 'Email is Required'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required', [
      'required' => 'Username is Required'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("formd/vw_tambah_formd", $data);
      $this->load->view("layout/footer", $data);
    } else {
      $data = [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'tanggal' => $this->input->post('tanggal'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
      ];
      $upload_image = $_FILES['gambar']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/formd/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $upload_image = $_FILES['gambar_ktp']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/formd/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_ktp')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar_ktp', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->Formd_model->insert($data, $upload_image);
      $this->session->set_flashdata('message', '<div class="alert alert-success" 
      role="alert">The Data Successfully Added!</div>');
      redirect('Formd/formd/');
    }
  }

  public function formd()
  {
    $data['judul'] = "Halaman Formd";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['formd'] = $this->Formd_model->get();
    $this->load->view("layout/header", $data);
    $this->load->view("formd/vw_formd", $data);
    $this->load->view("layout/footer", $data);
  }
  function upload()
  {
    $data = [
      'nama_lengkap' => $this->input->post('nama_lengkap'),
      'tanggal' => $this->input->post('tanggal'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
    ];
    $this->formd_model->insert($data);
    redirect('Formd/formd/');
  }
  public function hapus($id)
  {
    $this->Formd_model->delete($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>The Data P Cannot be Deleted (Successfully Related)!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>The Data P Successfully Deleted!</div>');
    }
    redirect('Formd/formd/');
  }

  public function edit($id)
  {
    $data['judul'] = "Halaman Edit Data";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['formd'] = $this->Formd_model->getById($id);

    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
      'required' => 'Nama Lengkap is Required'
    ]);
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
      'required' => 'Tanggal is Required'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin is Required'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required', [
      'required' => 'Email is Required'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required', [
      'required' => 'Username is Required'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("formd/vw_ubah_formd", $data);
      $this->load->view("layout/footer", $data);
    } else {
      $editedData = [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'tanggal' => $this->input->post('tanggal'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
      ];
      $upload_image = $_FILES['gambar']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/formd/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
          $old_image = $data['formd']['gambar'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/formd/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
        $upload_image = $_FILES['gambar_ktp']['name'];
        if ($upload_image) {
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '2048';
          $config['upload_path'] = './assets/img/formd/';
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('gambar_ktp')) {
            $old_image = $data['formd']['gambar_ktp'];
            if ($old_image != 'default.jpg') {
              unlink(FCPATH . 'assets/img/formd/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar_ktp', $new_image);
          } else {
            echo $this->upload->display_errors();
          }
        }
          // Ambil ID formd yang diubah dari input
          $id = $this->input->post('id');
          $this->Formd_model->update(['id' => $id], $data, $upload_image);
          $updateResult = $this->Formd_model->update(['id' => $id], $editedData);
          if ($updateResult) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Data F Successfully Edited!</div>');
            redirect('Formd/formd/');
          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit the data!</div>');
            redirect('Formd/formd/');
          }
        }
      }
    

  public function detail($id)
  {
    $data['judul'] = "Halaman Detail Data";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['formd'] = $this->Formd_model->getById($id);
    $this->load->view("layout/header", $data);
    $this->load->view("formd/vw_detail_formd", $data);
    $this->load->view("layout/footer", $data);
  }
}
