<?php
class Salary extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Salary_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function insert() {
        // Form Validation Rules
        $this->form_validation->set_rules('employee_number', 'Employee Number', 'required|numeric');
        $this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
        $this->form_validation->set_rules('ot_salary', 'OT Salary', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, load form view again
            $this->load->view('salary_form');
        } else {
            // Validation successful, insert data into database
            $data = array(
                'employee_number' => $this->input->post('employee_number'),
                'salary' => $this->input->post('salary'),
                'ot_salary' => $this->input->post('ot_salary')
            );

            if ($this->Salary_model->insert_salary($data)) {
                $this->load->view('salary_success');
            } else {
                // $this->load->view('salary_form');
                echo "Please Try Again";
            }
        }
    }
}
?>
