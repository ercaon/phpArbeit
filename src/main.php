<?php
// Initialize variables for total price and form data
$totalPrice = 0;
$cores = $ram = $ssd = null;

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get selected values from the form
    $cores = isset($_POST['cores']) ? $_POST['cores'] : null;
    $ram = isset($_POST['ram']) ? $_POST['ram'] : null;
    $ssd = isset($_POST['ssd']) ? $_POST['ssd'] : null;

    // Price calculation for cores
    switch ($cores) {
        case '1': $totalPrice += 5; break;
        case '2': $totalPrice += 10; break;
        case '4': $totalPrice += 18; break;
        case '8': $totalPrice += 30; break;
        case '16': $totalPrice += 45; break;
    }

    // Price calculation for RAM
    switch ($ram) {
        case '512': $totalPrice += 5; break;
        case '1024': $totalPrice += 10; break;
        case '2048': $totalPrice += 20; break;
        case '4096': $totalPrice += 40; break;
        case '8192': $totalPrice += 80; break;
        case '16384': $totalPrice += 160; break;
        case '32768': $totalPrice += 320; break;
    }

    // Price calculation for SSD
    switch ($ssd) {
        case '10': $totalPrice += 5; break;
        case '20': $totalPrice += 10; break;
        case '40': $totalPrice += 20; break;
        case '80': $totalPrice += 40; break;
        case '240': $totalPrice += 120; break;
        case '500': $totalPrice += 250; break;
        case '1000': $totalPrice += 500; break;
    }

    // Redirect to the confirmation page with the total price
    header("Location: price_page.php?totalPrice=" . urlencode($totalPrice));
    exit();
}
?>
