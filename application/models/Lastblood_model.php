<?php
class Lastblood_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_data($data) {
        $this->db->insert('lastblood', $data);
        return $this->db->insert_id();
    }

    public function get_all_data() {
        $query = $this->db->order_by('id', 'desc')->get('lastblood');
        return $query->result();
    }

    public function get_data_by_id($id) {
        $query = $this->db->get_where('lastblood', array('id' => $id));
        return $query->row();
    }

    public function update_data($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('lastblood', $data);
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('lastblood', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }

    public function login_driver($identity, $password) {
        $this->db->where(" status = 1 AND (email = '$identity' OR phone = '$identity') AND password = '" . md5($password) . "'");
        $query = $this->db->get('lastblood');
               log_message('error', $this->db->last_query());

        if ($query->num_rows() == 1) {
            return true;
        }

        return false;
    }
}
