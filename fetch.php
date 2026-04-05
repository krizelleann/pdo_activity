<?php
require 'dbconfig.php';

// 1. Fetch all attendees from the database
$sql = "SELECT * FROM attendances";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$attendees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Concert Attendance List</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            margin: 0;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }

        /* The Grid that holds the cards */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: auto;
        }

        /* Individual Card Styling */
        .attendee-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            border-top: 8px solid #007bff; /* Blue accent top */
            transition: transform 0.2s;
        }

        .attendee-card:hover {
            transform: translateY(-5px);
        }

        .status-pill {
            background: #e6f4ea;
            color: #1e7e34;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 22px;
            font-weight: bold;
            color: #1a1a1a;
            margin: 0 0 15px 0;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f1f1;
            font-size: 14px;
        }

        .detail-row:last-child { border-bottom: none; }

        .label { color: #7f8c8d; font-weight: 500; }
        .value { color: #2d3436; font-weight: bold; }
        
        .ticket-vip { color: #007bff; }
        .price-text { color: #007bff; font-size: 18px; }

    </style>
</head>
<body>

    <div class="header-section">
        <h1>Concert Attendance Dashboard</h1>
        <p>Total Attendees: <?php echo count($attendees); ?></p>
    </div>

    <div class="grid-container">
        <?php foreach ($attendees as $person): ?>
            <div class="attendee-card">
                <div class="status-pill">Connected Successfully</div>
                <h2 class="card-title"><?php echo $person['attendee_name']; ?></h2>

                <div class="detail-row">
                    <span class="label">Attendee ID:</span>
                    <span class="value">#<?php echo $person['id']; ?></span>
                </div>

                <div class="detail-row">
                    <span class="label">Concert Date:</span>
                    <span class="value"><?php echo $person['concert_date']; ?></span>
                </div>

                <div class="detail-row">
                    <span class="label">Ticket Type:</span>
                    <span class="value <?php echo ($person['ticket_type'] == 'VIP') ? 'ticket-vip' : ''; ?>">
                        <?php echo $person['ticket_type']; ?>
                    </span>
                </div>

                <div class="detail-row">
                    <span class="label">Seat Number:</span>
                    <span class="value"><?php echo $person['seat_number']; ?></span>
                </div>

                <div class="detail-row">
                    <span class="label">Total Paid:</span>
                    <span class="value price-text">P<?php echo number_format($person['price'], 2); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>