<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jail Visitor Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
        }

        .data-table tbody tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Jail Visitor Appointment Data List</h2>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Visitor Name</th>
                        <th>Visitor ID</th>
                        <th>Appointment Date</th>
                        <th>Reason for Visit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'jail-dbcon.php';

                    $query = "SELECT * FROM jail_visitors";
                    $result = mysqli_query($con, $query);

                    if($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['visitor_name'] . "</td>";
                            echo "<td>" . $row['visitor_id'] . "</td>";
                            echo "<td>" . $row['appointment_date'] . "</td>";
                            echo "<td>" . $row['reason_for_visit'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No jail visitor appointments found.</td></tr>";
                    }

                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
