<?php
require 'dbconfig.php';

// --- DATA FOR THE NEW INSERTION ---
$new_name  = "Bruno Mars";
$new_date  = "2026-08-20";
$new_type  = "VIP";
$new_price = 300.00;
$new_seat  = "B1";
// ----------------------------------

$sql = "INSERT INTO attendances (attendee_name, concert_date, ticket_type, price, seat_number)
        VALUES (:name, :date, :type, :price, :seat)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':name'  => $new_name,
    ':date'  => $new_date,
    ':type'  => $new_type,
    ':price' => $new_price,
    ':seat'  => $new_seat
]);

$lastId = $pdo->lastInsertId(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        /* This keeps the card exactly in the middle of the page */
        body { 
            background-color: #f0f2f5; 
            font-family: 'Segoe UI', sans-serif; 
            display: flex; 
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        .card { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            width: 450px; 
            border-top: 10px solid #28a745; 
            text-align: left;
        }

        /* Clean connection badge inside the card */
        .status-pill {
            background: #e6f4ea;
            color: #1e7e34;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 25px;
        }

        .success-msg { 
            font-size: 34px; 
            color: #1a1a1a; 
            margin: 0 0 20px 0; 
            line-height: 1.2;
        }

        .detail-row { 
            display: flex; 
            justify-content: space-between; 
            padding: 15px 0; 
            border-bottom: 1px solid #f1f1f1; 
        }

        .label { color: #7f8c8d; font-weight: 500; }
        .value { font-weight: bold; color: #2d3436; }

        .btn { 
            display: block; 
            text-align: center; 
            margin-top: 30px; 
            text-decoration: none; 
            background: #007bff; 
            color: white; 
            padding: 15px; 
            border-radius: 12px; 
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
        }
        .btn:hover { background: #0056b3; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="card">
        <div class="status-pill">✓ Connected to rock_concert</div>
        
        <h1 class="success-msg"><b>Record inserted successfully!</b></h1>
        
        <div class="detail-row">
            <span class="label">New Attendee ID:</span>
            <span class="value">#<?php echo $lastId; ?></span>
        </div>
        <div class="detail-row">
            <span class="label">Name:</span>
            <span class="value"><?php echo $new_name; ?></span>
        </div>
        <div class="detail-row">
            <span class="label">Ticket Type:</span>
            <span class="value" style="color: #007bff;"><?php echo $new_type; ?></span>
        </div>
        <div class="detail-row">
            <span class="label">Seat Number:</span>
            <span class="value"><?php echo $new_seat; ?></span>
        </div>

        <a href="table.php" class="btn">Go to Overall Attendees</a>
    </div>

</body>
</html>