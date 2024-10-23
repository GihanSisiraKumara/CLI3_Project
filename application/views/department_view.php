<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
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
</head>
<body>
<div class="navbar">
    <div class="left-section">Employee Management System</div>
    <div class="right-section">
        <button onclick="window.location.href='/codeignitear/'">View all Details</button>
        <button onclick="window.location.href='/codeignitear/index.php/Department/insert'">Add Department</button>
        
    </div>
</div> 

    <h2>Department List</h2>
    
    <table >
        <thead>
            <tr>
                <th>Department ID</th>
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($departments)): ?>
                <?php foreach ($departments as $department): ?>
                    <tr>
                        <td><?php echo $department->depid; ?></td>
                        <td><?php echo $department->depname; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No departments found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
