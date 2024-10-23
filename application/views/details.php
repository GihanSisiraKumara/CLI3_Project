


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Details</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f7f7f7;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px;
            color: white;
            border-radius: 8px;
        }
        .navbar .left-section {
            font-size: 20px;
            font-weight: bold;
            margin-left: 20px;
        }
        .navbar .right-section {
            margin-right: 20px;
        }
        .navbar .right-section button {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .navbar .right-section button:hover {
            background-color: darkgreen;
        }
        /* Table Styling */
        table {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        td {
            color: #333;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        /* Add rounded corners to the table */
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        /* Customize the table border */
        table, th, td {
            border: 1px solid #ddd;
        }
        /* Set width for the Date of Birth column */
        th:nth-child(5), td:nth-child(5) {
            width: 150px; /* Adjust this value as needed */
        }
        /* Button Styling */
        .submit-button {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            background-color: blue;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .submit-button:hover {
            background-color: darkblue;
        }
        /* Icon Button Styling */
        .action-buttons i {
            cursor: pointer;
            padding: 10px;
            margin: 0 5px;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .action-buttons i:hover {
            background-color: #45a049;
        }
        .action-buttons .delete {
            background-color: #f44336;
        }
        .action-buttons .delete:hover {
            background-color: darkred;
        }

        .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black with opacity */
}

/* Modal content */
.modal-content {
  background-color: #fff;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  max-width: 500px;
}

/* Close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content button {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content button:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

        /* Responsive Table */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide headers for small screens */
            thead tr {
                display: none;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: left;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 10px;
                white-space: nowrap;
                font-weight: bold;
            }

            tr {
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                background-color: white;
            }
        }

        /* Adjust button layout on mobile */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .navbar .right-section {
                margin-top: 10px;
            }

            .navbar .right-section button {
                margin-left: 0;
                margin-bottom: 10px;
            }
        }
    </style>


<script>
// Function to open the modal and set the correct profile image
function openModal(profilePicUrl) {
  var modal = document.querySelector('.modal');
  modal.style.display = 'block';

  // Set the image source dynamically
  var modalImg = modal.querySelector('img');
  modalImg.src = profilePicUrl;
}

// Function to close the modal
function closeModal() {
  var modal = document.querySelector('.modal');
  modal.style.display = 'none';
}
</script>
</head>
<body>

<!-- Navbar Section -->
<div class="navbar">
    <div class="left-section">Employee Management System</div>
    <div class="right-section">
    <div class="dropdown">
            <button class="dropbtn">Employee Attendance</button>
            <div class="dropdown-content">
                <!-- <button onclick="window.location.href='/codeignitear/index.php/EmpController/viewAttendance'">View attendance</button> -->
                <button onclick="window.location.href='/codeignitear/index.php/EmpController/uploadCSV'">Upload CSV File</button>
                
            </div>
     </div>

   

        <button onclick="window.location.href='/codeignitear/index.php/EmpController/insert'">Add Employee</button>
        <!-- <button onclick="window.location.href='/codeignitear/index.php/Department/view'"> Department</button> -->
    <div class="dropdown">
            <button class="dropbtn">Department</button>
            <div class="dropdown-content">
                <button onclick="window.location.href='/codeignitear/index.php/department/insert'">Add Department</button>
                <button onclick="window.location.href='/codeignitear/index.php/Department/view'">See Department</button>
            </div>
        </div>
    </div>
</div>

<h2>Employee Details</h2>

<table>
    <thead>
        <tr>
            <th>Emp ID</th>
            <th>Department</th>
            <th>Name</th>
            <th>NIC</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Civil Status</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>Profile</th>
            <th>Salary</th>
            <th>OT</th>
            <th>Actions</th> <!-- New column for actions -->
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($employee_salary_details)) : ?>
            <?php foreach ($employee_salary_details as $employee) : ?>
                <tr>
                    <td data-label="Emp ID"><?php echo $employee['employee_number']; ?></td>
                    <td data-label="Department"><?php echo $employee['department']; ?></td>
                    <td data-label="Name"><?php echo $employee['fname']; ?></td>
                    <td data-label="NIC"><?php echo $employee['nic']; ?></td>
                    <td data-label="Date of Birth"><?php echo $employee['bdate']; ?></td>
                    <td data-label="Address"><?php echo $employee['address']; ?></td>
                    <td data-label="Gender"><?php echo $employee['gender']; ?></td>
                    <td data-label="Civil Status"><?php echo $employee['status']; ?></td>
                    <td data-label="Contact No"><?php echo $employee['contact_number']; ?></td>
                    <td data-label="Email"><?php echo $employee['email']; ?></td>
                    

                    <td>
        <!-- Profile button -->
        <button onclick="openModal('<?php echo base_url('uploads/') . $employee['profile_pic']; ?>')">Profile</button>
        
        <!-- Modal structure -->
        <div id="profileModal-<?php echo $employee['employee_number']; ?>" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close" onclick="closeModal('<?php echo $employee['employee_number']; ?>')">&times;</span>
            <img id="profileImg-<?php echo $employee['employee_number']; ?>" src="" alt="Profile Picture" style="width:100%;">
          </div>
        </div>
      </td>


                    <td data-label="Salary"><?php echo $employee['salary']; ?></td>
                    <td data-label="OT"><?php echo $employee['ot_salary']; ?></td>
                    <!-- Action Buttons -->
                    <td data-label="Actions" class="action-buttons">
                        <i class="fas fa-edit" title="Edit" onclick="window.location.href='/codeignitear/index.php/EmpController/update/<?php echo $employee['employee_number']; ?>'"></i>
                        <i class="fas fa-trash delete" title="Delete" onclick="window.location.href='/codeignitear/index.php/EmpController/delete/<?php echo $employee['employee_number']; ?>'"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="13">No employee salary details available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>



</body>
</html>
