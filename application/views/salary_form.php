<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration Form in HTML CSS</title>
  <!---Custom CSS File--->
  <style>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background: rgb(130, 106, 251);
    }

    .container {
      position: relative;
      max-width: 700px;
      width: 100%;
      background: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .container header {
      font-size: 1.5rem;
      color: #333;
      font-weight: 500;
      text-align: center;
    }

    .container .form {
      margin-top: 30px;
    }

    .form .input-box {
      width: 100%;
      margin-top: 20px;
    }

    .input-box label {
      color: #333;
    }

    .form :where(.input-box input, .select-box) {
      position: relative;
      height: 50px;
      width: 100%;
      outline: none;
      font-size: 1rem;
      color: #707070;
      margin-top: 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 0 15px;
    }

    .input-box input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .form .column {
      display: flex;
      column-gap: 15px;
    }

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

    .address :where(input, .select-box) {
      margin-top: 15px;
    }

    .select-box select {
      height: 100%;
      width: 100%;
      outline: none;
      border: none;
      color: #707070;
      font-size: 1rem;
    }

    .form button {
      height: 55px;
      width: 100%;
      color: #fff;
      font-size: 1rem;
      font-weight: 400;
      margin-top: 30px;
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: rgb(130, 106, 251);
    }

    .form button:hover {
      background: rgb(88, 56, 250);
    }

    a[href*="/codeignitear/"] {
  display: inline-block;
  margin-top: 20px;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  background-color: #007bff; /* blue color */
  color: #fff;
  text-decoration: none;
  transition: all 0.2s ease;
}

a[href*="/codeignitear/"]:hover {
  background-color: #0069d9; /* darker blue color on hover */
}

    /*Responsive*/
    @media screen and (max-width: 500px) {
      .form .column {
        flex-wrap: wrap;
      }

      .form :where(.gender-option, .gender) {
        row-gap: 15px;
      }
    }
  </style>
  <!-- <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
  <section class="container">
    <header>Salary Information</header>
<div class="form">

    <?php echo validation_errors(); ?>
    <?php echo form_open('salary/insert'); ?>

      <div class="input-box">

        <input type="text" name="employee_number"type="text" name="employee_number" placeholder="Employee Number" required />
      </div>

      <div class="input-box">

        <input type="text" name="salary" placeholder="Enter basick salary" required />
      </div>

      <div class="input-box">

        <input type="text" name="ot_salary" placeholder="Enter OT salary" required />
      </div>
      <button>Submit</button>
</div>

<?php echo form_close(); ?>
    
    <a href="/codeignitear/">View  Details</a>

  </section>


</body>

</html>