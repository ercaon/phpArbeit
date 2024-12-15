<?php
    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // init var and const
        $server_resources_json = file_get_contents('../data/servers.json');
        $server_resources = json_decode($server_resources_json, true);

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

        if ()

        // math money
        if (isset($_POST['cores']) && isset($coresPrice[$_POST['cores']])) {

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