<?php
class Department extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Department_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function insert() {
        // Form Validation Rules
        $this->form_validation->set_rules('depid', 'Department Number', 'required|numeric');
        $this->form_validation->set_rules('depname', 'Department Name', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, load form view again
            $this->load->view('department_form');
        } else {
            // Validation successful, insert data into database
            $data = array(
                'depid' => $this->input->post('depid'),
                'depname' => $this->input->post('depname')
            );

            // Insert department data
            if ($this->Department_model->insert_salary($data)) {
                // Fetch all departments and pass them to the view
                $data['departments'] = $this->Department_model->get_departments(); 
                $this->load->view('department_view', $data); // Pass departments data to the view
            } else {
                $this->load->view('salary_form');
            }
        }
    }
    public function view() {
        $data['departments'] = $this->Department_model->get_departments();
        $this->load->view('department_view', $data);
    }

    
    // public function uploadCSV() {
    //     // Load the form and file helpers
    //     $this->load->helper(array('form', 'url'));

    //     // Set file upload configurations
    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'csv';
    //     $config['max_size'] = 1000;

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('csv_file')) {
    //         // If the upload failed, pass the error message to the view
    //         $data['error'] = $this->upload->display_errors();
    //         $this->load->view('upload_csv_form', $data);
    //     } else {
    //         // Success: process the CSV file
    //         $data['upload_data'] = $this->upload->data();
    //         $this->load->view('csv_file_success', $data);
    //     }
    // }
    
    // public function viewAttendance() {
    //     // Load employee data from the database
    //     $this->load->model('Employee_model');
    //     $employees = $this->Employee_model->getAllEmployees(); 

    //     // Get the CSV data from the session
    //     $csv_data = $this->session->userdata('csv_data');

    //     // Prepare the result data to display in the view
    //     $result = [];
    //     foreach ($employees as $employee) {
    //         $exists_in_csv = 0; // Default: not in the CSV

    //         // Check if employee number is in the CSV file
    //         foreach ($csv_data as $csv_row) {
    //             if (trim($csv_row[0]) == $employee['employee_number']) {
    //                 $exists_in_csv = 1;
    //                 break;
    //             }
    //         }

    //         $result[] = [
    //             'employee_number' => $employee['employee_number'],
    //             'name' => $employee['name'],
    //             'exists_in_csv' => $exists_in_csv
    //         ];
    //     }

    //     // Pass the result to the view
    //     $data['attendance'] = $result;
    //     $this->load->view('view_attendance', $data);
    // }

    
}
?>
