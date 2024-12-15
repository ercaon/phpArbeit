<?php
// Get the total price from the URL parameter
$totalPrice = isset($_GET['totalPrice']) ? $_GET['totalPrice'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OmniCloud - Your Total Price</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="title_omni"> Omni </div><div class="title_cloud"> Cloud </div>
    <div class="Total_Price_Txt">Your Total Price: <?php echo $totalPrice; ?> CHF</div>
    <a href="configure.php" class="buy_button" >Back to configuration</a>
</body>
</html>
