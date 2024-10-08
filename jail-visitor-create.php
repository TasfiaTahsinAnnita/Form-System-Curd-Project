<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Jail Visitor Appointment</title>
</head>
<body>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Jail Visitor Appointment
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="jail-code.php" method="POST">

                        <div class="mb-3">
                            <label>Visitor Name</label>
                            <input type="text" name="visitor_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Visitor ID</label>
                            <input type="text" name="visitor_id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Appointment Date</label>
                            <input type="date" name="appointment_date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Visiting Time</label>
                            <input type="time" name="visiting_time" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Reason for Visit</label>
                            <input type="text" name="reason_for_visit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_appointment" class="btn btn-primary">Save Appointment</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
