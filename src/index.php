<!DOCTYPE html>
<html lang="en">   
    <head>
        <title>OmniCloud - Choose your VM</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="title_omni"> Omni </div><div class="title_cloud"> Cloud </div>

        <form method="post" action="">
            <input type="text" class="email" id="email" name="email" required>
            <label for="email">Email</label>

            <h1 class="radio_vm_text"> How Many Cores do you want? </h1>

            <input type="radio" class="radio_vm" id="1" name="cores" value="1" required>
            <label for="1">1 Core (+5 CHF)</label><br>

            <input type="radio" class="radio_vm" id="2" name="cores" value="2" required>
            <label for="2">2 Cores (+10 CHF)</label><br>

            <input type="radio" class="radio_vm" id="4" name="cores" value="4" required>
            <label for="4">4 Cores (+18 CHF)</label><br>

            <input type="radio" class="radio_vm" id="8" name="cores" value="8" required>
            <label for="8">8 Cores (+30 CHF)</label><br>

            <input type="radio" class="radio_vm" id="16" name="cores" value="16" required>
            <label for="16">16 Cores (+45 CHF)</label><br>


            <h1 class="radio_vm_text"> How much RAM do you need? </h1>

            <input type="radio" class="radio_vm" id="512" name="ram" value="512" required>
            <label for="512">512 RAM (+5 CHF)</label><br>

            <input type="radio" class="radio_vm" id="1024" name="ram" value="1024" required>
            <label for="1024">1'024 RAM (+10 CHF)</label><br>

            <input type="radio" class="radio_vm" id="2048" name="ram" value="2048" required>
            <label for="2048">2'048 RAM (+20 CHF)</label><br>

            <input type="radio" class="radio_vm" id="4096" name="ram" value="4096" required>
            <label for="4096">4'096 RAM (+40 CHF)</label><br>

            <input type="radio" class="radio_vm" id="8192" name="ram" value="8192" required>
            <label for="8192">8'192 RAM (+80 CHF)</label><br>

            <input type="radio" class="radio_vm" id="16384" name="ram" value="16384" required>
            <label for="16384">16'384 RAM (+160 CHF)</label><br>

            <input type="radio" class="radio_vm" id="32768" name="ram" value="32768" required>
            <label for="32768">32'768 RAM (+320 CHF)</label><br>

            
            <h1 class="radio_vm_text">How much Memory do you need? </h1>

            <input type="radio" class="radio_vm" id="10" name="ssd" value="10" required>
            <label for="10">10 GB SSD (+5 CHF)</label><br>

            <input type="radio" class="radio_vm" id="20" name="ssd" value="20" required>
            <label for="20">20 GB SSD (+10 CHF)</label><br>

            <input type="radio" class="radio_vm" id="40" name="ssd" value="40" required>
            <label for="40">40 GB SSD (+20 CHF)</label><br>

            <input type="radio" class="radio_vm" id="80" name="ssd" value="80" required>
            <label for="80">80 GB SSD (+40 CHF)</label><br>

            <input type="radio" class="radio_vm" id="240" name="ssd" value="240" required>
            <label for="240">240 GB SSD (+120 CHF)</label><br>

            <input type="radio" class="radio_vm" id="500" name="ssd" value="500" required>
            <label for="500">500 GB SSD (+250 CHF)</label><br>

            <input type="radio" class="radio_vm" id="1000" name="ssd" value="1000" required>
            <label for="1000">1,000 GB SSD (+500 CHF)</label><br>

            <button type="submit" style="margin-bottom:20rem" value="Check Availability"></button>
        </form>
        <?php
            // Check if form data is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // init var and const
                $server_resources = json_decode(file_get_contents('../data/servers.json'), true);

                if ($server_resources === null) {
                    echo "<p>Fehler beim Laden der Serverdatenbank.</p>";
                }

                $cores_needed = $_POST['cores'];
                $ram_needed = $_POST['ram'];
                $ssd_needed = $_POST['ssd'];
                $email = $_POST['email'];

                $totalPrice = 0;

                $coresPrice = [
                    '1' => 5,
                    '2' => 10,
                    '4' => 18,
                    '8' => 30,
                    '16' => 45
                ];

                $ramPrice = [
                    '512' => 5,
                    '1024' => 10,
                    '2048' => 20,
                    '4096' => 40,
                    '8192' => 80,
                    '16384' => 160,
                    '32768' => 320
                ];

                $ssdPrice = [
                    '10' => 5,
                    '20' => 10,
                    '40' => 20,
                    '80' => 40,
                    '240' => 120,
                    '500' => 250,
                    '1000' => 500
                ];

                // check if free resources
                function check_resources($requested_cpu, $requested_ram, $requested_ssd, $available_server) {
                    $best_server = null;

                    foreach ($available_server as $server) {
                        if ($server['available_cpu'] >= $requested_cpu &&
                            $server['available_ram'] >= $requested_ram &&
                            $server['available_ssd'] >= $requested_ssd){
                                // check for smalles available server
                                if ($best_server === null || $server['id'] < $best_server['id']) {
                                    $best_server = $server;
                                }
                        }
                    }
                    return $best_server ? $best_server['id'] : null;
                }

                $result = check_resources($cores_needed, $ram_needed, $ssd_needed, $server_resources);
                // !! FRONTEND ANPASSUNGEN NÖTIG
                if ($result) {
                    echo "<p>Server stehen zur verfügung, es würde:</p>";
                } else {
                    echo "<p>Keine passenden Server gefunden.</p>";
                }

                // money math
                if (isset($_POST['cores']) && isset($coresPrice[$_POST['cores']])) {
                    $totalPrice += $coresPrice[$_POST['cores']];
                }

                // Preis für RAM berechnen
                if (isset($_POST['ram']) && isset($ramPrice[$_POST['ram']])) {
                    $totalPrice += $ramPrice[$_POST['ram']];
                }

                // Preis für SSD berechnen
                if (isset($_POST['ssd']) && isset($ssdPrice[$_POST['ssd']])) {
                    $totalPrice += $ssdPrice[$_POST['ssd']];
                }

                // !! FRONTEND ANPASSUNGEN NÖTIG
                echo "<p>$totalPrice CHF kosten.</p>";
            }
        ?>

        <form>
            <input type="button" class="book" id="book" name="book">
            <label for="book">Kaufen</label>
        </form>
    </body>
</html>