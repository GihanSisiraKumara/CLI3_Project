Emp_model


<?php
class Emp_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function insert_employee($data) {
        return $this->db->insert('empdata', $data);
    }

    public function delete_salary_by_employee_number($employee_number) {
        $this->db->where('employee_number', $employee_number);
        $this->db->delete('salary');
    }

    // Delete employee details from empdata
    public function delete_employee($employee_number) {
        $this->db->where('employee_number', $employee_number);
        $this->db->delete('empdata');
    }

    public function get_employee_by_number($employee_number) {
        return $this->db->get_where('empdata', ['employee_number' => $employee_number])->row();
    }

    public function update_employee($employee_number, $data) {
        $this->db->where('employee_number', $employee_number);
        $this->db->update('empdata', $data);
    }

    public function getEmployees() {
        $query = $this->db->get('empdata');
        return $query->result_array(); // Return all employee data as an array
    }

    
}
?>
