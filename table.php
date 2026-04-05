<?php
// Mutes the background "Connected successfully" text
ob_start(); 
require 'dbconfig.php';
ob_end_clean(); 

$stmt = $pdo->query("SELECT * FROM attendances");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Concert Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding-top: 50px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        h2 {
            font-size: 32px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        h2::before {
            content: '🎟️';
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 15px;
        }

        thead {
            background-color: #f1f5f9;
        }

        th {
            text-align: left;
            padding: 18px;
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 20px 18px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-size: 15px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        /* Styling for the Ticket Type badges */
        .badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-vip {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-general {
            background-color: #e0f2fe;
            color: #075985;
        }

        .seat-number {
            font-family: monospace;
            background: #f1f5f9;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Concert Attendance List</h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Ticket Type</th>
                    <th>Seat Assignment</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td style="font-weight: 600; color: #94a3b8;">#<?php echo $row['id']; ?></td>
                    <td style="font-weight: 600;"><?php echo htmlspecialchars($row['attendee_name']); ?></td>
                    <td>
                        <?php 
                            $type = strtolower($row['ticket_type']);
                            $class = ($type == 'vip') ? 'badge-vip' : 'badge-general';
                        ?>
                        <span class="badge <?php echo $class; ?>">
                            <?php echo strtoupper($row['ticket_type']); ?>
                        </span>
                    </td>
                    <td><span class="seat-number"><?php echo $row['seat_number']; ?></span></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>