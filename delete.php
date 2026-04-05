<?php
// This line catches any "echo" from dbconfig.php so it doesn't ruin the UI
ob_start(); 
require 'dbconfig.php';
ob_end_clean(); // This deletes the "Connected successfully" text from the background

// --- DATA FOR DELETION ---
$target_name = "Bruno Mars";
// -------------------------

try {
    $sql = "DELETE FROM attendances WHERE attendee_name = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $target_name]);
} catch (PDOException $e) {
    // Silent error or handle as needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <style>
        body { 
            background-color: #f0f2f5; 
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            overflow: hidden; /* Prevents stray text from creating scrollbars */
        }

        .card { 
            background: white; 
            padding: 50px; 
            border-radius: 35px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.08); 
            width: 500px; 
            position: relative;
            border-top: 12px solid #ed5565; /* Clean Red for Deletion */
            text-align: left;
        }

        .status-pill {
            background: #fff5f5;
            color: #e3342f;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-bottom: 30px;
            border: 1px solid #fed7d7;
        }

        .status-pill::before {
            content: '✕';
            margin-right: 8px;
            font-size: 12px;
        }

        .success-msg { 
            font-size: 42px; 
            color: #1a202c; 
            margin: 0 0 40px 0; 
            letter-spacing: -1.5px;
            font-weight: 800;
            line-height: 1.1;
        }

        .detail-row { 
            display: flex; 
            justify-content: space-between; 
            padding: 20px 0; 
            border-bottom: 1px solid #edf2f7; 
        }

        .label { color: #a0aec0; font-weight: 500; font-size: 16px; }
        .value { font-weight: 700; color: #2d3748; font-size: 16px; }

        .btn { 
            display: block; 
            text-align: center; 
            margin-top: 45px; 
            text-decoration: none; 
            background: #007bff; 
            color: white; 
            padding: 20px; 
            border-radius: 18px; 
            font-weight: 700;
            font-size: 18px;
            transition: transform 0.2s, background 0.2s;
        }
        .btn:hover { 
            background: #0069d9; 
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="status-pill">Action Processed</div>
        
        <h1 class="success-msg">Record deleted successfully!</h1>
        
        <div class="detail-row">
            <span class="label">Target Database:</span>
            <span class="value">rock_concert</span>
        </div>
        <div class="detail-row">
            <span class="label">Attendee Name:</span>
            <span class="value"><?php echo htmlspecialchars($target_name); ?></span>
        </div>
        <div class="detail-row">
            <span class="label">Status:</span>
            <span class="value" style="color: #e3342f;">REMOVED</span>
        </div>

        <a href="table.php" class="btn">Go to Overall Attendees</a>
    </div>

</body>
</html>