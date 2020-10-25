<?php
$AutoRun = [
	"meme"=>"print'hi'",
	//"ui"=>strval(fread(fopen('games/ui.lua','r'),filesize('ui.lua'))),
	//"esp"=>strval(fread(fopen('games/Esp.lua','r'),filesize('games/Esp.lua'))),
];
$response = [
];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$data = json_decode($_GET['data'],true);
$Player = $data["Player"];
$Player["Name"]=$Player["Name"].'69';
$Game = $data["Game"];
$Auth = $data["Auth"];
$stime = time();
$ping = 0;

if (!$Game["time"]) {
	die('{"Response":"PHP Error"}');
}
for ($i=-4;$i<=4;$i++){
	$hash = hash('md5',$stime+$i);
	if ($hash==hash('md5',$Game["time"])){
		$response["time"]=$i;
		$ping = $i;
	};
};
if (!$ping){	
	die('{"Response":"PHP Time Error"}');
}

$servername = "ftp.eskihosting.xyz";
$username = "Eski";
$password = "w9x5K9KEqY5pucoj";

$conn = mysqli_connect($servername, $username, $password,"eski");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
};
$result = mysqli_query($conn,strval("SELECT * FROM `users` WHERE `Key` = '".$Auth["Key"]."'")); 
$array = mysqli_fetch_assoc($result);
if (strval($ip) == strval($array['last_ip'])) {
}else{
	$quer = mysqli_query($conn,strval("UPDATE `users` SET `last_ip`='".$_SERVER['REMOTE_ADDR']."' WHERE `Key` = '".$Auth["Key"]."'")); 


};

if ($array['Key']){
	$response['run']=$AutoRun;
	$response['Player']=$Player;
	//$Player
	//$response['ui']=strval(fread(fopen('games/ui.lua','r'),filesize('games/ui.lua')));
	if (is_file('games/'.$Game["Place"])){
		$response['Game']=strval(fread(fopen('games/'.$Game["Place"],'r'),filesize('games/'.$Game["Place"])));
	} else {
		$response['Game']=[
			"Game"=>$Game["Game"],
			
		];
	};
	//echo '{"Response" : "Whitelisted"}';
} else {
	$response["Response"]="User not Whitelisted";
}

$conn->close();


echo json_encode($response);
//echo (json_encode($Auth["Key"]));
//echo $_GET['key'];
?>
