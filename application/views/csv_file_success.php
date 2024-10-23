<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2em;
        }
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table thead tr {
            background-color: #4CAF50;
            color: white;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            color: #333;
        }

        p {
            text-align: center;
            color: #888;
            font-size: 1.2em;
        }
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

        /* Responsive design for smaller devices */
        @media screen and (max-width: 600px) {
            table thead {
                display: none;
            }

            table, table tbody, table tr, table td {
                display: block;
                width: 100%;
            }

            table tr {
                margin-bottom: 15px;
            }

            table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
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
        <!-- <button onclick="window.location.href='/codeignitear/index.php/Department/insert'">Add Department</button> -->
        
    </div>
</div> 

<h1>CSV File Attendance Details View</h1>

<?php if (!empty($csv_data)): ?>
    <table>
        <thead>
            <tr>
                <?php foreach ($csv_data[0] as $header): ?>
                    <th><?php echo $header; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i < count($csv_data); $i++): ?>
                <tr>
                    <?php foreach ($csv_data[$i] as $cell): ?>
                        <td data-label="<?php echo $csv_data[0][array_search($cell, $csv_data[$i])]; ?>"><?php echo $cell; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No CSV data available.</p>
<?php endif; ?>

</body>
</html>
