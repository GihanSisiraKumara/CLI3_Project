<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Insert Success</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 15px 30px;
        }
        .left-section {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .right-section button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .right-section button:hover {
            background-color: #45a049;
        }
        /* Styling the success message */
        h1 {
            text-align: center;
            color: #333;
            margin-top: 100px;
            font-size: 32px;
            font-weight: bold;
            color: #4CAF50;
        }
        /* Center the content */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="left-section">Employee Management System</div>
    <div class="right-section">
        <button onclick="window.location.href='/codeignitear/index.php/EmpController/insert'">Add Employee</button>
        <button onclick="window.location.href='/codeignitear/'">View Details</button>
    </div>
</div>

<h1> Details Delete successfully!</h1>

</body>
</html>
