<?php
class Details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Salary_model'); // Load the Salary model
        $this->load->helper('url');
    }

    public function index() {
        // Fetch employee details using the model
        $data['employee_salary_details'] = $this->Salary_model->get_employee_salary_details();
        
        // Load the Details view and pass the data
        $this->load->view('details', $data);
    }
}
?>
