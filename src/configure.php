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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OmniCloud - Choose your VM</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="title_omni"> Omni </div><div class="title_cloud"> Cloud </div>

    <form method="POST">
        <h1 class="radio_vm_text"> How Many Cores do you want? </h1>

        <input type="radio" class="radio_vm" id="1" name="cores" value="1" required <?php if ($cores == '1') echo 'checked'; ?>>
        <label for="1">1 Core (+5 CHF)</label><br>

        <input type="radio" class="radio_vm" id="2" name="cores" value="2" required <?php if ($cores == '2') echo 'checked'; ?>>
        <label for="2">2 Cores (+10 CHF)</label><br>

        <input type="radio" class="radio_vm" id="4" name="cores" value="4" required <?php if ($cores == '4') echo 'checked'; ?>>
        <label for="4">4 Cores (+18 CHF)</label><br>

        <input type="radio" class="radio_vm" id="8" name="cores" value="8" required <?php if ($cores == '8') echo 'checked'; ?>>
        <label for="8">8 Cores (+30 CHF)</label><br>

        <input type="radio" class="radio_vm" id="16" name="cores" value="16" required <?php if ($cores == '16') echo 'checked'; ?>>
        <label for="16">16 Cores (+45 CHF)</label><br>

        <h1 class="radio_vm_text"> How much RAM do you need? </h1>

        <input type="radio" class="radio_vm" id="512" name="ram" value="512" required <?php if ($ram == '512') echo 'checked'; ?>>
        <label for="512">512 RAM (+5 CHF)</label><br>

        <input type="radio" class="radio_vm" id="1024" name="ram" value="1024" required <?php if ($ram == '1024') echo 'checked'; ?>>
        <label for="1024">1'024 RAM (+10 CHF)</label><br>

        <input type="radio" class="radio_vm" id="2048" name="ram" value="2048" required <?php if ($ram == '2048') echo 'checked'; ?>>
        <label for="2048">2'048 RAM (+20 CHF)</label><br>

        <input type="radio" class="radio_vm" id="4096" name="ram" value="4096" required <?php if ($ram == '4096') echo 'checked'; ?>>
        <label for="4096">4'096 RAM (+40 CHF)</label><br>

        <input type="radio" class="radio_vm" id="8192" name="ram" value="8192" required <?php if ($ram == '8192') echo 'checked'; ?>>
        <label for="8192">8'192 RAM (+80 CHF)</label><br>

        <input type="radio" class="radio_vm" id="16384" name="ram" value="16384" required <?php if ($ram == '16384') echo 'checked'; ?>>
        <label for="16384">16'384 RAM (+160 CHF)</label><br>

        <input type="radio" class="radio_vm" id="32768" name="ram" value="32768" required <?php if ($ram == '32768') echo 'checked'; ?>>
        <label for="32768">32'768 RAM (+320 CHF)</label><br>

        <h1 class="radio_vm_text">How much Memory do you need? </h1>

        <input type="radio" class="radio_vm" id="10" name="ssd" value="10" required <?php if ($ssd == '10') echo 'checked'; ?>>
        <label for="10">10 GB SSD (+5 CHF)</label><br>

        <input type="radio" class="radio_vm" id="20" name="ssd" value="20" required <?php if ($ssd == '20') echo 'checked'; ?>>
        <label for="20">20 GB SSD (+10 CHF)</label><br>

        <input type="radio" class="radio_vm" id="40" name="ssd" value="40" required <?php if ($ssd == '40') echo 'checked'; ?>>
        <label for="40">40 GB SSD (+20 CHF)</label><br>

        <input type="radio" class="radio_vm" id="80" name="ssd" value="80" required <?php if ($ssd == '80') echo 'checked'; ?>>
        <label for="80">80 GB SSD (+40 CHF)</label><br>

        <input type="radio" class="radio_vm" id="240" name="ssd" value="240" required <?php if ($ssd == '240') echo 'checked'; ?>>
        <label for="240">240 GB SSD (+120 CHF)</label><br>

        <input type="radio" class="radio_vm" id="500" name="ssd" value="500" required <?php if ($ssd == '500') echo 'checked'; ?>>
        <label for="500">500 GB SSD (+250 CHF)</label><br>

        <input type="radio" class="radio_vm" id="1000" name="ssd" value="1000" required <?php if ($ssd == '1000') echo 'checked'; ?>>
        <label for="1000">1,000 GB SSD (+500 CHF)</label><br>

        <button type="submit" style="margin-bottom:20rem">Submit</button>
    </form>
</body>
</html>
