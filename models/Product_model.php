<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]

class Product_model extends CI_Model
{
  public $table = 'product';
  public $id = 'product.id';

  public function __construct()
  {
    parent::__construct();
  }
  public function get()
  {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getById($id)
  {
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }
  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id('product', $data);
  }
  public function get_all_product()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_id', 'DESC');
    $info = $this->db->get();
    return $info->result();
  }

  public function delete($id)
  {
    $this->db->where($this->id, $id);
    ;
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }
}
