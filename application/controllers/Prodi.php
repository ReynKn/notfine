<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]

class Prodi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prodi_model');
  }

  public function tambahP()
  {
    $data['judul'] = "Halaman Tambah Prodi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['prodi'] = $this->Prodi_model->get();
    $this->form_validation->set_rules('prodi', 'Prodi', 'required', [
      'required' => 'Program Studi is Required'
    ]);
    $this->form_validation->set_rules('ruangan', 'Ruangan', 'required', [
      'required' => 'Ruangan is Required'
    ]);
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', [
      'required' => 'Jurusan is Required'
    ]);
    $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', [
      'required' => 'Tell Me The Akreditasi'
    ]);
    $this->form_validation->set_rules('nama_kaprodi', 'Nama Kepala Prodi', 'required', [
      'required' => 'Nama Kepala Program Studi is Required'
    ]);
    $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required', [
      'required' => 'Tahun Berdiri is Required'
    ]);
    $this->form_validation->set_rules('output_lulusan', 'Output Lulusan', 'required', [
      'required' => 'Lulusan is Required',
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("mahasiswa/vw_tambah_prodi", $data);
      $this->load->view("layout/footer", $data);
    } else {
      $data = [
        'prodi' => $this->input->post('prodi'),
        'ruangan' => $this->input->post('ruangan'),
        'jurusan' => $this->input->post('jurusan'),
        'akreditasi' => $this->input->post('akreditasi'),
        'nama_kaprodi' => $this->input->post('nama_kaprodi'),
        'tahun_berdiri' => $this->input->post('tahun_berdiri'),
        'output_lulusan' => $this->input->post('output_lulusan'),
      ];
      $upload_image = $_FILES['gambar']['name'];
      if ($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/prodi/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')){
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        } else{
          echo $this->upload->display_errors();
        }
      }
      $this->Prodi_model->insert($data, $upload_image);
      $this->session->set_flashdata('message', '<div class="alert alert-success" 
      role="alert">The Data P Successfully Added!</div>');
      redirect('Prodi/prodi');
    }
  }

  public function prodi()
  {
    $data['judul'] = "Halaman Prodi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['prodi'] = $this->Prodi_model->get();
    $this->load->view("layout/header", $data);
    $this->load->view("mahasiswa/vw_prodi", $data);
    $this->load->view("layout/footer", $data);
  }
  function upload()
  {
    $data = [
      'prodi' => $this->input->post('prodi'),
      'ruangan' => $this->input->post('ruangan'),
      'jurusan' => $this->input->post('jurusan'),
      'akreditasi' => $this->input->post('akreditasi'),
      'nama_kaprodi' => $this->input->post('nama_kaprodi'),
      'tahun_berdiri' => $this->input->post('tahun_berdiri'),
      'output_lulusan' => $this->input->post('output_lulusan'),
    ];
    $this->Prodi_model->insert($data);
    redirect('Prodi/prodi');
  }
  public function hapus($id)
  {
    $this->Prodi_model->delete($id);
      $error=$this->db->error();
      if($error['code'] !=0 ){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>The Data P Cannot be Deleted (Successfully Related)!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>The Data P Successfully Deleted!</div>');
      }    
    redirect('Prodi/prodi');
  }

  public function edit($id)
  {
    $data['judul'] = "Halaman Edit Prodi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['prodi'] = $this->Prodi_model->getById($id);

    $this->form_validation->set_rules('prodi', 'Nama Program Studi', 'required', [
      'required' => 'Nama Program Studi is Required'
    ]);
    $this->form_validation->set_rules('ruangan', 'Ruangan', 'required', [
      'required' => 'Ruangan is Required'
    ]);
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', [
      'required' => 'Jurusan is Required'
    ]);
    $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', [
      'required' => 'Akreditasi is Required'
    ]);
    $this->form_validation->set_rules('nama_kaprodi', 'Nama Kepala Program Studi', 'required', [
      'required' => 'Nama Kepala Program Studi is Required'
    ]);
    $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required', [
      'required' => 'Tahun Berdiri Program Studi is Required'
    ]);
    $this->form_validation->set_rules('output_lulusan', 'Output Lulusan', 'required', [
      'required' => 'Output Lulusan is Required',
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("mahasiswa/vw_ubah_prodi", $data);
      $this->load->view("layout/footer", $data);
    } else {
      $editedData = [
        'prodi' => $this->input->post('prodi'),
        'ruangan' => $this->input->post('ruangan'),
        'jurusan' => $this->input->post('jurusan'),
        'akreditasi' => $this->input->post('akreditasi'),
        'nama_kaprodi' => $this->input->post('nama_kaprodi'),
        'tahun_berdiri' => $this->input->post('tahun_berdiri'),
        'output_lulusan' => $this->input->post('output_lulusan'),
      ];
      $upload_image = $_FILES['gambar']['name'];
      if ($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/prodi/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
          $old_image = $data['prodi']['gambar'];
          if ($old_image != 'default.jpg'){
            unlink(FCPATH . 'assets/img/prodi/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar',$new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }

      // Ambil ID prodi yang diubah dari input
      $id = $this->input->post('id');
      $this->Prodi_model->update(['id'=> $id], $data, $upload_image);
      $updateResult = $this->Prodi_model->update(['id' => $id], $editedData);
      if ($updateResult) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Data P Successfully Edited!</div>');
        redirect('Prodi/prodi');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit the data!</div>');
        redirect('Prodi/prodi');
      }
    }
  }

  public function detail($id)
  {
    $data['judul'] = "Halaman Detail Prodi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['prodi'] = $this->Prodi_model->getById($id);
    $this->load->view("layout/header", $data);
    $this->load->view("mahasiswa/vw_detail_prodi", $data);
    $this->load->view("layout/footer", $data);
  }
}
