<?php
// database connection
$conn = new mysqli("localhost", "root", "", "art_gallery");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Count queries
$artist = $conn->query("SELECT COUNT(*) AS total FROM artist")->fetch_assoc()['total'];
$artType = $conn->query("SELECT COUNT(*) AS total FROM arttype")->fetch_assoc()['total'];
$artMedium = $conn->query("SELECT COUNT(*) AS total FROM artmedium")->fetch_assoc()['total'];
$artProduct = $conn->query("SELECT COUNT(*) AS total FROM product")->fetch_assoc()['total'];
$unanswered = $conn->query("SELECT COUNT(*) AS total FROM enquiry WHERE status IS NULL")->fetch_assoc()['total'];
$answered = $conn->query("SELECT COUNT(*) AS total FROM enquiry WHERE status='Answered'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">VibeArt</div>
        <div class="admin-info">
            <span>Admin</span>
        </div>
    </div>

<div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Artists</a></li>
            <li><a href="#">Art Types</a></li>
            <li><a href="#">Art Mediums</a></li>
            <li><a href="#">Art Products</a></li>
            <li><a href="#">Enquiries</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="center-content">
    <h2 class="title">DASHBOARD</h2>
    <div class="dashboard">
        <div class="card pink">Total Artists: <span><?php echo $artist; ?></span></div>
        <div class="card blue">Unanswered Enquiries: <span><?php echo $unanswered; ?></span></div>
        <div class="card pink">Answered Enquiries: <span><?php echo $answered; ?></span></div>
        <div class="card dark">Art Types: <span><?php echo $artType; ?></span></div>
        <div class="card blue">Art Mediums: <span><?php echo $artMedium; ?></span></div>
        <div class="card dark">Art Products: <span><?php echo $artProduct; ?></span></div>
    </div>
</div>
</body>
</html>
