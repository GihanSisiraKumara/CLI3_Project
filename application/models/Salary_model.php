<?php
class Salary_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function insert_salary($data) {
        return $this->db->insert('salary', $data);
    }

    public function get_employee_salary_details() {
        $this->db->select('empdata.employee_number, empdata.department, empdata.fname, empdata.nic, empdata.bdate, empdata.address, empdata.gender, empdata.status, empdata.contact_number, empdata.email, empdata.profile_pic, salary.salary, salary.ot_salary');
        $this->db->from('empdata');
        $this->db->join('salary', 'empdata.employee_number = salary.employee_number');
        $query = $this->db->get();
        return $query->result_array();  // Return as an array
    }

    public function get_salary_by_employee_number($employee_number) {
        return $this->db->get_where('salary', ['employee_number' => $employee_number])->row();
    }

    public function update_salary($employee_number, $data) {
        $this->db->where('employee_number', $employee_number);
        $this->db->update('salary', $data);
    }
}
?>
