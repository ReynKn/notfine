<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class DashUser_model extends CI_Model
{
  public function get_all_featured_product()
  {

    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_feature', 1);
    $this->db->limit(4);
    $this->db->order_by('product_id', 'DESC');

    $query = $this->db->get();

    return $query->result();

  }

  public function get_all_new_product()
  {

    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')));
    $this->db->limit(4);
    $this->db->order_by('product_id', 'DESC');

    $query = $this->db->get();

    return $query->result();

  }
  public function get_all_product()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_id', 'DESC');
    $info = $this->db->get();
    return $info->result();
  }

  public function get_all_product_pagi($limit, $offset)
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_id', 'DESC');
    $this->db->limit($limit, $offset);
    $info = $this->db->get();
    return $info->result();
  }

  public function get_single_product($id)
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_id', $id);
    $info = $this->db->get();
    return $info->row();
  }

  public function get_product_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_id', $id);
    $info = $this->db->get();
    return $info->row();
  }

  public function save_customer_info($data)
  {
    $this->db->insert('customer', $data);
    return $this->db->insert_id();
  }

  public function save_shipping_address($data)
  {
    $this->db->insert('shipping', $data);
    return $this->db->insert_id();
  }

  public function get_customer_info($data)
  {
    $this->db->select('*');
    $this->db->from('customer');
    $this->db->where($data);
    $info = $this->db->get();
    return $info->row();
  }

  public function save_payment_info($data)
  {
    $this->db->insert('payment', $data);
    return $this->db->insert_id();
  }

  public function save_order_info($data)
  {
    $this->db->insert('orders', $data);
    return $this->db->insert_id();
  }

  public function save_order_details_info($oddata)
  {
    $this->db->insert('order_detail', $oddata);
  }


}
