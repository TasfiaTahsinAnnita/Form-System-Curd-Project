<?php
require 'jail-dbcon.php';

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Edit form submission
if(isset($_POST['edit_submit'])) {
    $visitor_id = sanitize($_POST['visitor_id']);
    $visitor_name = sanitize($_POST['visitor_name']);
    $appointment_date = sanitize($_POST['appointment_date']);
    $reason_for_visit = sanitize($_POST['reason_for_visit']);

    $query = "UPDATE jail_visitors SET visitor_name='$visitor_name', appointment_date='$appointment_date', reason_for_visit='$reason_for_visit' WHERE id='$visitor_id'";
    if(mysqli_query($con, $query)) {
        header("Location: jail-visitor-view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Remove data
if(isset($_GET['remove_id'])) {
    $remove_id = sanitize($_GET['remove_id']);
    $query = "DELETE FROM jail_visitors WHERE id='$remove_id'";
    if(mysqli_query($con, $query)) {
        header("Location: jail-visitor-view.php");
        exit();
    } else {
        echo "Error removing record: " . mysqli_error($con);
    }
}

// Fetch visitor data for editing
if(isset($_GET['edit_id'])) {
    $edit_id = sanitize($_GET['edit_id']);
    $query = "SELECT * FROM jail_visitors WHERE id='$edit_id'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No record found!";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jail Visitor Appointment</title>
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

        .edit-form {
            margin-bottom: 40px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 10px;
        }

        .edit-form input[type="text"],
        .edit-form input[type="date"],
        .edit-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .edit-form input[type="submit"],
        .edit-form a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-form a {
            background-color: #dc3545;
            margin-left: 10px;
        }

        .data-list {
            overflow-x: auto;
            border-collapse: collapse;
            width: 100%;
        }

        .data-list th,
        .data-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-list th {
            background-color: #f2f2f2;
        }

        .data-list tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .data-list tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 class="title">Edit Jail Visitor Appointment</h2>
        <div class="edit-form">
            <form action="" method="POST">
                <input type="hidden" name="visitor_id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                <label for="visitor_name">Visitor Name:</label>
                <input type="text" id="visitor_name" name="visitor_name" value="<?php echo isset($row['visitor_name']) ? $row['visitor_name'] : ''; ?>">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" value="<?php echo isset($row['appointment_date']) ? $row['appointment_date'] : ''; ?>">
                <label for="reason_for_visit">Reason for Visit:</label>
                <textarea id="reason_for_visit" name="reason_for_visit"><?php echo isset($row['reason_for_visit']) ? $row['reason_for_visit'] : ''; ?></textarea>
                <input type="submit" name="edit_submit" value="Update">
                <a href="jail-visitor-view.php">Cancel</a>
            </form>
        </div>

        <div class="data-list">
            <h2>Jail Visitor Appointment Data List</h2>
            <table>
                <tr>
                    <th>Visitor Name</th>
                    <th>Visitor ID</th>
                    <th>Appointment Date</th>
                    <th>Reason for Visit</th>
                    <th>Actions</th>
                </tr>
                <?php
                $query = "SELECT * FROM jail_visitors";
                $result = mysqli_query($con, $query);
                if($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['visitor_name'] . "</td>";
                        echo "<td>" . $row['visitor_id'] . "</td>";
                        echo "<td>" . $row['appointment_date'] . "</td>";
                        echo "<td>" . $row['reason_for_visit'] . "</td>";
                        echo "<td><a href='jail-visitor-edit.php?edit_id=" . $row['id'] . "'>Edit</a> | <a href='jail-visitor-edit.php?remove_id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this item?');\">Remove</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No jail visitor appointments found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($con); ?>