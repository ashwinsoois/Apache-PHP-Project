<?php
include 'db.php';

// Function to ping local IP addresses
function pingDevice($ip) {
    // Windows vs Linux ping adjustments
    $str = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "ping -n 1 -w 500 " . $ip : "ping -c 1 -W 1 " . $ip;
    exec($str, $output, $status);
    return ($status === 0);
}

$stmt = $pdo->query('SELECT * FROM network_devices');
$devices = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Network Monitor</title>
    <style>
        .online { color: green; font-weight: bold; }
        .offline { color: red; font-weight: bold; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>🏠 Home Network Status Monitor</h2>
    <table>
        <tr><th>Device</th><th>IP Address</th><th>Type</th><th>Status</th></tr>
        <?php foreach ($devices as $device): ?>
            <?php $is_online = pingDevice($device['ip_address']); ?>
            <tr>
                <td><?= htmlspecialchars($device['device_name']) ?></td>
                <td><?= htmlspecialchars($device['ip_address']) ?></td>
                <td><?= htmlspecialchars($device['device_type']) ?></td>
                <td class="<?= $is_online ? 'online' : 'offline' ?>">
                    <?= $is_online ? '● ONLINE' : '○ OFFLINE' ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
