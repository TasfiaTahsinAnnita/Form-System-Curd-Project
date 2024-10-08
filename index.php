<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Jail Communication System</title>
    <style>
        body {
            background-color: #333333;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-content {
            font-size: 16px;
        }
        .create-button {
            text-align: center;
            margin-top: 50px;
        }
        .create-button a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .create-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Center Jail Communication System</h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <!-- View Appointment Form -->
        <div class="card">
            <h2 class="card-title">View Appointment Form</h2>
            
            <p class="card-content">Make an appointment</p>
            <button onclick="window.location.href='jail-visitor-create.php'" style="padding: 10px 20px; margin-top: 10px;">Click Here</button>
        </div>
        <!-- Edit Appointments -->
        <div class="card">
            <h2 class="card-title">Edit Appointments</h2>
            
            <p class="card-content">Change Appointment</p>
            <button onclick="window.location.href='jail-visitor-edit.php'" style="padding: 10px 20px; margin-top: 10px;">Click Here</button>
        </div>
        <!-- View Appointment List -->
        <div class="card">
            <h2 class="card-title">View Appointment List</h2>
            
            <p class="card-content">See the pending appointments</p>
            <button onclick="window.location.href='jail-visitor-view.php'" style="padding: 10px 20px; margin-top: 10px;">Click Here</button>
        </div>
    </div>
</body>
</html>
