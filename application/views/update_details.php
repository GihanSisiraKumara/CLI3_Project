<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Update Employee and Salary Details</title>
  <style>
    /* Styling similar to your insert.php page */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
    body { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; background: rgb(130, 106, 251); }
    .container { position: relative; max-width: 700px; width: 100%; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); }
    .container header { font-size: 1.5rem; color: #333; font-weight: 500; text-align: center; }
    .container .form { margin-top: 30px; }
    .form .input-box { width: 100%; margin-top: 20px; }
    .input-box label { color: #333; }
    .form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}

    .form input, select { height: 50px; width: 100%; margin-top: 8px; padding: 0 15px; border: 1px solid #ddd; border-radius: 6px; }
    .form button { height: 55px; width: 100%; color: #fff; background: rgb(130, 106, 251); margin-top: 30px; border: none; cursor: pointer; transition: 0.2s; }
    .form button:hover { background: rgb(88, 56, 250); }
  </style>
</head>

<body>
  <section class="container">
    <header>Update Employee and Salary Details</header>
    
    <!-- Show validation errors if there are any -->
    <?php echo validation_errors(); ?>
    
    <!-- Start form for employee update -->
   
    <form action="<?php echo site_url('EmpController/update/'.$employee->employee_number); ?>" method="post" >

    <div class="form">
      <!-- Employee details -->
      <div class="input-box">
        <label>Employee Number</label>
        <input type="text" name="employee_number" value="<?php echo $employee->employee_number; ?>" readonly />
      </div>

      <div class="input-box">
        <label>Department</label>
        <select name="department" required>
          <option value="">Select Department</option>
          <option value="Developing department" <?php if($employee->department == 'Developing department') echo 'selected'; ?>>Developing department</option>
          <option value="QA department" <?php if($employee->department == 'QA department') echo 'selected'; ?>>QA department</option>
          <option value="HR department" <?php if($employee->department == 'HR department') echo 'selected'; ?>>HR department</option>
          <option value="BA department" <?php if($employee->department == 'BA department') echo 'selected'; ?>>BA department</option>
        </select>
      </div>

      <div class="input-box">
        <label>First Name</label>
        <input type="text" name="fname" value="<?php echo $employee->fname; ?>" required />
      </div>

      <div class="input-box">
        <label>Last Name</label>
        <input type="text" name="lname" value="<?php echo $employee->lname; ?>" required />
      </div>

      <div class="input-box">
        <label>NIC Number</label>
        <input type="text" name="nic" value="<?php echo $employee->nic; ?>" required />
      </div>

      <div class="input-box">
        <label>Birth Day</label>
        <input type="text" name="bdate" value="<?php echo $employee->bdate; ?>" required />
      </div>

      <div class="input-box">
        <label>Living Address</label>
        <input type="text" name="address" value="<?php echo $employee->address; ?>" required />
      </div>

      <div class="gender-box">
        <label>Gender</label>
        <div class="gender-option">
        <label><input type="radio" name="gender" value="Male" <?php if($employee->gender == 'Male') echo 'checked'; ?>> Male</label>
        <label><input type="radio" name="gender" value="Female" <?php if($employee->gender == 'Female') echo 'checked'; ?>> Female</label>
        </div>
      </div>

      <div class="gender-box">
        <label>Civil Status</label>
        <div class="gender-option">
        <label><input type="radio" name="status" value="Single" <?php if($employee->status == 'Single') echo 'checked'; ?>> Single</label>
        <label><input type="radio" name="status" value="Married" <?php if($employee->status == 'Married') echo 'checked'; ?>> Married</label>
        </div>
      </div>

      

      <div class="input-box">
        <label>Contact Number</label>
        <input type="text" name="contact_number" value="<?php echo $employee->contact_number; ?>" required />
      </div>

      <div class="input-box">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $employee->email; ?>" required />
      </div>

      <!-- Salary details -->
      <header>Salary Details</header>
      
      <div class="input-box">
        <label>Salary</label>
        <input type="number" name="salary" value="<?php echo $salary->salary; ?>" required />
      </div>

      <div class="input-box">
        <label>OT Salary</label>
        <input type="number" name="ot_salary" value="<?php echo $salary->ot_salary; ?>" required />
      </div>

      <div class="input-box address">
      <lable>Upload Profile Picture</lable>
     <input type="file" name="profile_pic" accept="image/*" required />
     </div>

      <!-- Submit button -->
      <button type="submit">Update Details</button>
    </div>
    
    <?php echo form_close(); ?>
  </section>
</body>

</html>
