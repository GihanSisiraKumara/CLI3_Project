Emp Controller



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpController extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('Emp_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Salary_model'); //(Add new line)
        $this->load->model('Department_model');//add new line
    }
    //add new department details

    public function adddep() {
        $this->load->model('Department_model');
        $data['departments'] = $this->Department_model->get_all_departments(); // new change Fetch departments
        $this->load->view('insert_form', $data); // Load view and pass department data
    }

	// public function insert() {

	// 	$this->load->library('form_validation');
    //     // Form Validation Rules
    //     $this->form_validation->set_rules('employee_number', 'Employee Number', 'required|numeric');
       
	//     $this->form_validation->set_rules('department', 'Department Name', 'required');
    //     $this->form_validation->set_rules('fname', 'First Name', 'required');
    //     $this->form_validation->set_rules('lname', 'Last Name', 'required');
    //     $this->form_validation->set_rules('nic', 'NIC', 'required');
    //     $this->form_validation->set_rules('bdate', 'Birth Day', 'required');
    //     $this->form_validation->set_rules('address', 'Address', 'required');
    //     $this->form_validation->set_rules('gender', 'Gender', 'required');
	// 	$this->form_validation->set_rules('status', 'Status', 'required');
	// 	$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


    //     if ($this->form_validation->run() === FALSE) {
    //         // Validation failed, load form view again
    //         $this->load->view('insert_form');
    //     } else {
    //         // Validation successful, insert data into database
    //         $data = array(
	// 			'employee_number' => $this->input->post('employee_number'),
	// 			'department' => $this->input->post('department'),
	// 			'fname' => $this->input->post('fname'),
	// 			'lname' => $this->input->post('lname'),
	// 			'nic' => $this->input->post('nic'),
	// 			'bdate' => $this->input->post('bdate'),
	// 			'address' => $this->input->post('address'),
	// 			'gender' => $this->input->post('gender'),
	// 			'status' => $this->input->post('status'),
	// 			'contact_number' => $this->input->post('contact_number'),
	// 			'email' => $this->input->post('email')
	// 		);

    //         if ($this->Emp_model->insert_employee($data)) {
    //             $this->load->view('salary_form');
    //         } else {
    //             // $this->load->view('insert_form');
	// 			echo "Please Try Again";	
    //         }
    //     }
    // }

    // Insert employee details with image
    public function insert() {
        // Set form validation rules
        $this->form_validation->set_rules('employee_number', 'Employee Number', 'required');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('nic', 'NIC Number', 'required');
        $this->form_validation->set_rules('bdate', 'Birth Day', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Civil Status', 'required');
        //$this->form_validation->set_rules('department', 'Department', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Load the form view again if validation fails
            $this->load->view('insert_form');
        } else {
            // Handle file upload (profile picture)
            $config['upload_path'] = './uploads/'; // Folder where images will be saved
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
            $config['max_size'] = '2048'; // Max size in KB (2MB)
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_pic')) {
                // Handle upload error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('insert_form', $error);
            } else {
                // Upload success - Get file data
                $fileData = $this->upload->data();
                $profile_pic = $fileData['file_name']; // Get the uploaded file name

                // Gather form data
                $empData = array(
                    'employee_number' => $this->input->post('employee_number'),
                    'department' => $this->input->post('department'),
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'nic' => $this->input->post('nic'),
                    'bdate' => $this->input->post('bdate'),
                    'address' => $this->input->post('address'),
                    'contact_number' => $this->input->post('contact_number'),
                    'email' => $this->input->post('email'),
                    'gender' => $this->input->post('gender'),
                    'status' => $this->input->post('status'),
                    
                    'profile_pic' => $profile_pic // Save the profile image filename
                );

                // Insert data into the database via model
                $this->Emp_model->insert_employee($empData);
                $this->load->view('salary_form');
                // Redirect to the details page after successful insertion
               // redirect('EmpController/details');
            }
        }
    }

    // Display employee details
    public function details() {
        $data['employees'] = $this->Emp_model->getEmployees(); // Get all employee data from the model
        $this->load->view('details', $data); // Load the details view
    }
     
    public function delete($employee_number) {
        // Start by deleting the employee's salary data from the salary table
        $this->Emp_model->delete_salary_by_employee_number($employee_number);
        
        // Now, delete the employee data from the empdata table
        $this->Emp_model->delete_employee($employee_number);
        $this->load->view('details_delect');
        // Redirect to the details page after deletion
        // redirect('EmpController/details');
        
    }

    

    public function edit($employee_number) {
        // Get the employee data
        $data['employee'] = $this->Emp_model->get_employee_by_number($employee_number);
        $data['salary'] = $this->Salary_model->get_salary_by_employee_number($employee_number);
        // Load the edit form view
        $this->load->view('update_details', $data);
    }

    public function update($employee_number) {
        // Validation rules
        $this->form_validation->set_rules('employee_number', 'Employee Number', 'required|numeric');
		$this->form_validation->set_rules('department', 'Department Name', 'required');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'required');
        $this->form_validation->set_rules('bdate', 'Birth Day', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the edit form
            $this->edit($employee_number);
        } else {
            // Prepare the data to update
            $employee_data = array(
                'employee_number' => $this->input->post('employee_number'),
				'department' => $this->input->post('department'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'nic' => $this->input->post('nic'),
				'bdate' => $this->input->post('bdate'),
				'address' => $this->input->post('address'),
				'gender' => $this->input->post('gender'),
				'status' => $this->input->post('status'),
				'contact_number' => $this->input->post('contact_number'),
				'email' => $this->input->post('email')
            );

            // Handle optional profile image update
        if (!empty($_FILES['profile_pic']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '2048'; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile_pic')) {
                // If the file was successfully uploaded, get the new file name
                $fileData = $this->upload->data();
                $employee_data['profile_pic'] = $fileData['file_name']; // Save the new file name
            } else {
                // Handle upload error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('insert_form', $error);
                return; // Exit if there's an error with the upload
            }
        }
    
            // Prepare data for salary update
            $salary_data = array(
                'salary' => $this->input->post('salary'),
                'ot_salary' => $this->input->post('ot_salary')
            );
    
            // Update employee and salary records
            $this->Emp_model->update_employee($employee_number, $employee_data);
            $this->Salary_model->update_salary($employee_number, $salary_data);
    
            $this->load->view('update_success');
        }
    }

    public function uploadCSV() {
        // Load the form and file helpers
        $this->load->helper(array('form', 'url'));

        // Set file upload configurations
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 1000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('csv_file')) {
            // If the upload failed, pass the error message to the view
            $data['error'] = $this->upload->display_errors();
            $this->load->view('upload_csv_form', $data);
        } else {
            // Success: process the CSV file
            $data['upload_data'] = $this->upload->data();
         //Begin
          // Get the full path of the uploaded file
        $file_path = './uploads/' . $data['upload_data']['file_name'];

        // Open the CSV file and read its contents
        if (($handle = fopen($file_path, 'r')) !== FALSE) {
            $csv_data = array();
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $csv_data[] = $row;  // Store each row in the csv_data array
            }
            fclose($handle);
            $data['csv_data'] = $csv_data;  // Pass CSV data to the view
        }

          //end
            $this->load->view('csv_file_success', $data);
        }
    }
    
    public function viewAttendance() {
        // Load employee data from the database
        $this->load->model('Employee_model');
        $employees = $this->Employee_model->getAllEmployees(); 

        // Get the CSV data from the session
        $csv_data = $this->session->userdata('csv_data');

        // Prepare the result data to display in the view
        $result = [];
        foreach ($employees as $employee) {
            $exists_in_csv = 0; // Default: not in the CSV

            // Check if employee number is in the CSV file
            foreach ($csv_data as $csv_row) {
                if (trim($csv_row[0]) == $employee['employee_number']) {
                    $exists_in_csv = 1;
                    break;
                }
            }

            $result[] = [
                'employee_number' => $employee['employee_number'],
                'name' => $employee['name'],
                'exists_in_csv' => $exists_in_csv
            ];
        }

        // Pass the result to the view
        $data['attendance'] = $result;
        $this->load->view('view_attendance', $data);
    }
    

}
?>

