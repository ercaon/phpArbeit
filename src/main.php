<?php
    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // init var and const
        $server_resources = json_decode(file_get_contents('../data/servers.json'), true);
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

        $result = check_resources($requested_cpu, $requested_ram, $requested_ssd, $available_server);
        echo "<p>$result</p>";

        // math money
        if (isset($_POST['cores']) && isset($coresPrice[$_POST['cores']])) {
            $totalPrice += $coresPrice[$_POST['core']];
        }

        // Preis für RAM berechnen
        if (isset($_POST['ram']) && isset($ramPrice[$_POST['ram']])) {
            $totalPrice += $ramPrice[$_POST['ram']];
        }

        // Preis für SSD berechnen
        if (isset($_POST['ssd']) && isset($ssdPrice[$_POST['ssd']])) {
            $totalPrice += $ssdPrice[$_POST['ssd']];
        }
    }
?>