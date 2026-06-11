<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('sales')->result();
    }

    public function insert($data)
{
    return $this->db->insert('sales', $data);
}

public function get_by_id($id)
{
    return $this->db
        ->where('id_sales', $id)
        ->get('sales')
        ->row();
}

public function update($id, $data)
{
    return $this->db
        ->where('id_sales', $id)
        ->update('sales', $data);
}

public function delete($id)
{
    return $this->db
        ->where('id_sales', $id)
        ->delete('sales');
}

}