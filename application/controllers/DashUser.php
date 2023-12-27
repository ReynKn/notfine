<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class DashUser extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'userrole');
    $this->load->model('DashUser_model');
    $this->load->model('DashUser_model', 'model');
    $this->load->library('cart');
    $this->load->helper('text');
  }

  public function index()
  {
    $data = array();
    $this->load->model('DashUser_model', 'model');
    $data['all_featured_products'] = $this->DashUser_model->get_all_featured_product();
    $data['all_new_products'] = $this->DashUser_model->get_all_new_product();
      $this->load->view('layout/header_user', $data);
    $this->load->view('dash_user/user_home', $data);
    $this->load->view('layout/footer', $data);
  }

  public function cart()
  {
    $data = array();
    $data['cart_contents'] = $this->cart->contents();
    $this->load->view('layout/header_user', $data);
    $this->load->view('dash_user/cart', $data);
    $this->load->view('layout/footer', $data);
  }

  public function product()
  {
    $this->load->library('pagination');

    $config['base_url'] = base_url('DashUser/product');
    $config['total_rows'] = $this->db->get('product')->num_rows();
    $config['per_page'] = 8;
    $config['num_links'] = 2;
    $config['full_tag_open'] = '<ul>';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['prev_link'] = '&lt; Previous';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['last_link'] = false;
    $config['next_link'] = 'Next &gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);

    $data = array();
    $this->load->model('DashUser_model', 'model');
    $data['get_all_product'] = $this->model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));
    $this->load->helper('text');
    $this->load->view('layout/header_user', $data);
    $this->load->view('dash_user/product', $data);
    $this->load->view('layout/footer', $data);
  }

  public function single($id)
  {
    $data = array();
    $this->load->model('DashUser_model', 'model');
    $data['single_product'] = $this->model->get_single_product($id);
    if (!empty($data['single_product'])) {
      $this->load->view('layout/header_user', $data);
      $this->load->view('dash_user/single', $data);
      $this->load->view('layout/footer', $data);
    } else {
      $data['error_message'] = 'The requested product could not be found.';
      $this->load->view('layout/header_user', $data);
      $this->load->view('dash_user/product', $data);
      $this->load->view('layout/footer', $data);
    }
  }

  public function save_cart()
  {
    $this->load->model('DashUser_model');
    $product_id = $this->input->post('product_id');
    $results = $this->DashUser_model->get_product_by_id($product_id);

    if ($results !== null) {
      $data['id'] = $results->product_id;
      $data['name'] = $results->product_title;
      $data['price'] = $results->product_price;
      $data['qty'] = $this->input->post('qty');
      $data['options'] = array('product_image' => $results->product_image);

      $this->cart->insert($data);
      redirect('DashUser/cart');
    } else {

    }
  }

  public function update_cart() {
    $this->load->model('DashUser_model');

    $data = array();
    $data['qty'] = $this->input->post('qty');
    $data['rowid'] = $this->input->post('rowid');

    // Ambil informasi produk dari rowid
    $cart_item = $this->cart->get_item($data['rowid']);

    $updated_qty = $cart_item['qty'] + $data['qty'];

    // Pastikan kuantitas tidak menjadi negatif setelah pembaruan
    if ($updated_qty >= 0) {
        $this->cart->update($data);
    } else {
        // Tambahkan pesan kesalahan ke dalam session flashdata
        $this->session->set_flashdata('error', 'Kuantitas tidak boleh negatif.');
    }

    redirect('DashUser/cart');
}

  public function remove_cart()
  {
    $this->load->model('DashUser_model');
    $data = $this->input->post('rowid');
    $this->cart->remove($data);
    redirect('DashUser/cart');
  }

  public function customer_shipping()
  {
    $data = array();
    $this->load->view('layout/header_user', $data);
    $this->load->view('dash_user/customer_shipping', $data);
    $this->load->view('layout/footer', $data);
  }

  public function save_shipping_address()
  {
    $this->load->model('DashUser_model');
    $data = array();
    $data['shipping_name'] = $this->input->post('shipping_name');
    $data['shipping_email'] = $this->input->post('shipping_email');
    $data['shipping_address'] = $this->input->post('shipping_address');
    $data['shipping_phone'] = $this->input->post('shipping_phone');

    $this->form_validation->set_rules('shipping_name', 'Shipping Name', 'trim|required');
    $this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'trim|required');
    $this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'trim|required');

    if ($this->form_validation->run() == true) {
      $result = $this->DashUser_model->save_shipping_address($data);
      $this->session->set_userdata('shipping_id', $result);
      if ($result) {
        redirect('dash_user/checkout');
      } else {
        $this->session->set_flashdata('message', 'Customer Shipping Fail');
        redirect('DashUser/customer_shipping');
      }
    } else {
      $this->session->set_flashdata('message', validation_errors());
      redirect('DashUser/customer_shipping');
    }
  }

  public function checkout()
  {
    $data = array();
    $this->load->view('layout/header_user');
    $this->load->view('dash_user/checkout');
    $this->load->view('layout/footer');
  }

  public function payment()
  {
    $data = array();
    $this->load->view('layout/header_user');
    $this->load->view('dash_user/payment');
    $this->load->view('layout/footer');
  }

  public function save_order()
  {
    $this->load->model('DashUser_model');
    $data['payment_type'] = $this->input->post('payment');

    $this->form_validation->set_rules('payment', 'Payment', 'trim|required');

    if ($this->form_validation->run() == true) {
      $payment_id = $this->DashUser_model->save_payment_info($data);
      $odata = array();
      $odata['customer_id'] = $this->session->userdata('customer_id');
      $odata['shipping_id'] = $this->session->userdata('shipping_id');
      $odata['payment_id'] = $payment_id;
      $odata['order_total'] = $this->cart->total();

      $order_id = $this->DashUser_model->save_order_info($odata);

      $oddata = array();

      $myoddata = $this->cart->contents();

      foreach ($myoddata as $oddatas) {

        $oddata['order_id'] = $order_id;
        $oddata['product_id'] = $oddatas['id'];
        $oddata['product_name'] = $oddatas['name'];
        $oddata['product_price'] = $oddatas['price'];
        $oddata['product_quantity'] = $oddatas['qty'];
        $oddata['product_image'] = $oddatas['options']['product_image'];
        $this->DashUser_model->save_order_details_info($oddata);
      }

      // if ($payment_method == 'paypal') {

      // }
      // if ($payment_method == 'cashon') {

      // }

      $this->cart->destroy();

      redirect('DashUser/payment');
    } else {
      $this->session->set_flashdata('message', validation_errors());
      redirect('DashUser/checkout');
    }
  }

  public function search()
  {
    $search = $this->input->get('search');

    if (!empty($search)) {
      $data = array();
      $data['get_all_product'] = $this->DashUser_model->get_all_search_product($search);
      $data['search'] = $search;

      if ($data['get_all_product']) {
        $this->load->view('layout/auth_header');
        $this->load->view('dash_user/search', $data);
        $this->load->view('layout/footer');
      } else {
        redirect('error');
      }
    } else {
      redirect('error');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('customer_id');
    $this->session->unset_userdata('customer_email');
    redirect('customer/login');
  }

}


