<?php

function getEntry() {
	$conn = new mysqli("localhost", "u515566236_admin", "XuxCJw4aD9uj", "u515566236_wl");
	if ($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
	
	$result = $conn->query("SELECT username, password, ip, blacklisted FROM Whitelist");
	$rows = Array();
	while($row = $result->fetch_array()) {
		$rows[] = $row;
	}
	foreach($rows as $key => $row) {
		if ($row["password"] == $_GET["key"]) {
			return $row;
		}
		else {
			if ($key + 1 == count($rows)) {
				return "Invalid Credentials";
			}
		}
	}
}

function getScript() {
	$folder = "../diknhigger/";
	if (file_exists($folder . $_GET["script"] . ".lua")) {
		$content = file_get_contents($folder . $_GET["script"] . ".lua") or die("unable to open $Name.lua");
		die($content);
	}
	else {
		die("file does not exist");
	}
}

function updateIP() {
    $conn = new mysqli("localhost", "u515566236_admin", "XuxCJw4aD9uj", "u515566236_wl");
	if ($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
    $sql = "UPDATE Whitelist SET ip='" . $_SERVER['REMOTE_ADDR'] . "' WHERE username='" . $_GET['user'] . "'";
    mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        die("oof");
    }
}

$Info = getEntry();


if ($_SERVER["HTTP_USER_AGENT"] != "Roblox/WinInet" && $_SERVER["HTTP_USER_AGENT"] != "Asshurt/WinInet"){
	die("FAILED TO AUTHENTICATE");
}
if (isset($_SERVER["HTTP_ROBLOX_ID"])){
	die("FAILED TO AUTHENTICATE");
}
if ($_SERVER["HTTP_ACCEPT"] != "*/*"){
    die("FAILED TO AUTHENTICATE");
}
if ($_SERVER["REQUEST_METHOD"] != "GET") {
	die("FAILED TO AUTHENTICATE");
}
if ($_GET["user"] == "") {
	die("username not sent");
}
elseif ($_GET["pass"] == "") {
	die("password not sent");
}	
elseif ($_GET["script"] == "") {
	die("script name not sent");
}	

if (gettype($Info) == "array") {
	if ($Info["blacklisted"] == "true") {
		die("user is blacklisted");
	}
	else {
		if ($Info["ip"] == $_SERVER["REMOTE_ADDR"]) {
			getScript($Info);
			}
		else {
            if ($Info["ip"] == ""){
                updateIP();
                getScript($Info);
            }
			die("ip address is not consistent");
			}
		}
}
else {
	die($Info);
}

?>
