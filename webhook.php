<?php
header('Content-Type: application/json');
ob_start();
$json = file_get_contents('php://input'); 
$request = json_decode($json, true);
$action = $request["result"]["action"];
$session = $request["sessionId"];

$file = 'session.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current="";
file_put_contents($file, $current);
$current .= $session;
// Write the contents back to the file
file_put_contents($file, $current);

$confirmation="Sure. We will use the payment details in your wallet. You're all set up and ready to go!";
$output["speech"] = $confirmation;
$output["displayText"] = $confirmation;
$output["source"] = "local.php";
ob_end_clean();

echo json_encode($output);
?>
