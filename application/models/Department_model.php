<?php
class Department_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_salary($data) {
        return $this->db->insert('department', $data);
    }

   

    public function get_departments() {
        $query = $this->db->get('department');
        return $query->result(); // Returns an array of department objects
    }

    public function get_all_departments() {
        $query = $this->db->get('department');
        return $query->result(); // Returns an array of department objects
    }
}
?>
