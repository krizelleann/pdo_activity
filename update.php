<?php
// Prevents "Connected successfully" from appearing in the background
ob_start(); 
require 'dbconfig.php';
ob_end_clean(); 

// --- DATA FOR THE UPDATE ---
$target_id = 1;      // We are targeting the person with ID #1
$new_seat  = "A5";   // We are changing their seat to A5
// ---------------------------

try {
    // SQL command to update only the seat_number for a specific ID
    $sql = "UPDATE attendances SET seat_number = :seat WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':seat' => $new_seat,
        ':id'   => $target_id
    ]);
    
    $success = true;
} catch (PDOException $e) {
    $success = false;
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <style>
        body { 
            background-color: #f0f2f5; 
            font-family: 'Segoe UI', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        .card { 
            background: white; 
            padding: 45px; 
            border-radius: 30px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
            width: 480px; 
            border-top: 12px solid #007bff; /* Blue for Update */
            text-align: left;
        }

        .status-pill {
            background: #e7f3ff;
            color: #007bff;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .success-msg { 
            font-size: 38px; 
            color: #1a1a1a; 
            margin: 0 0 35px 0; 
            letter-spacing: -1px;
            font-weight: 800;
        }

        .detail-row { 
            display: flex; 
            justify-content: space-between; 
            padding: 18px 0; 
            border-bottom: 1px solid #f1f3f5; 
        }

        .label { color: #8a94a6; font-weight: 500; font-size: 16px; }
        .value { font-weight: 700; color: #1a1a1a; font-size: 16px; }

        .btn { 
            display: block; 
            text-align: center; 
            margin-top: 40px; 
            text-decoration: none; 
            background: #007bff; 
            color: white; 
            padding: 18px; 
            border-radius: 15px; 
            font-weight: 700;
            font-size: 17px;
            transition: 0.3s;
        }
        .btn:hover { background: #0056b3; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="card">
        <div class="status-pill">✎ Update Processed</div>
        
        <h1 class="success-msg">Record updated successfully!</h1>
        
        <div class="detail-row">
            <span class="label">Attendee ID:</span>
            <span class="value">#<?php echo $target_id; ?></span>
        </div>
        <div class="detail-row">
            <span class="label">Updated Field:</span>
            <span class="value">Seat Number</span>
        </div>
        <div class="detail-row">
            <span class="label">New Value:</span>
            <span class="value" style="color: #007bff;"><?php echo $new_seat; ?></span>
        </div>

        <a href="table.php" class="btn">Go to Overall Attendees</a>
    </div>

</body>
</html>