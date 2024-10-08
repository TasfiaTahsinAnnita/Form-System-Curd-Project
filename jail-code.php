<?php
session_start();
require 'jail-dbcon.php';

if(isset($_POST['save_appointment']))
{
    $visitor_name = mysqli_real_escape_string($con, $_POST['visitor_name']);
    $visitor_id = mysqli_real_escape_string($con, $_POST['visitor_id']);
    $appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
    $visiting_time = mysqli_real_escape_string($con, $_POST['visiting_time']); // Added visiting time variable
    $reason_for_visit = mysqli_real_escape_string($con, $_POST['reason_for_visit']);
    // Check if appointment date is greater than the present date
    $today = date('Y-m-d');
    if ($appointment_date <= $today) {
        $_SESSION['message'] = "Appointment date must be greater than today's date";
        header("Location: jail-visitor-create.php");
        exit(0);
    }

    // Check if visiting time is within the allowed range (8:00 a.m. to 6:00 p.m.)
    $min_time = strtotime('08:00:00');
    $max_time = strtotime('18:00:00');
    $appointment_time = strtotime($visiting_time);
    if ($appointment_time < $min_time || $appointment_time > $max_time) {
        $_SESSION['message'] = "Visiting time must be between 8:00 a.m. and 6:00 p.m.";
        header("Location: jail-visitor-create.php");
        exit(0);
    }

    $query = "INSERT INTO jail_visitors (visitor_name, visitor_id, appointment_date, visiting_time, reason_for_visit) VALUES ('$visitor_name','$visitor_id','$appointment_date','$visiting_time','$reason_for_visit')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Visitor appointment created successfully";
        header("Location: jail-visitor-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Failed to create visitor appointment";
        header("Location: jail-visitor-create.php");
        exit(0);
    }
}

if(isset($_POST['update_appointment']))
{
    $visitor_id = mysqli_real_escape_string($con, $_POST['visitor_id']);
    $visitor_name = mysqli_real_escape_string($con, $_POST['visitor_name']);
    $visitor_id = mysqli_real_escape_string($con, $_POST['visitor_id']);
    $appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
    $reason_for_visit = mysqli_real_escape_string($con, $_POST['reason_for_visit']);

    $query = "UPDATE jail_visitors SET visitor_name='$visitor_name', visitor_id='$visitor_id', appointment_date='$appointment_date', reason_for_visit='$reason_for_visit' WHERE id='$visitor_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Visitor appointment updated successfully";
        header("Location: jail-visitor-edit.php?id=$visitor_id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Failed to update visitor appointment";
        header("Location: jail-visitor-edit.php?id=$visitor_id");
        exit(0);
    }
}

?>
