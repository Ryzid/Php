<?php
$Array = array(
    "Neski-jd9.mdx6z-2fq9.3iqe"=>"key",
    ".mdx6z2fq9.3iqew8g78"=>"key",
    "Neski-5iq7f87.b-.k5r7387i"=>"key",
    "Neski-w8g78lxak-d.svko7io"=>"key",
    "Neski-slw.1n15i-q7f87.b.k"=>"key",
    "Neski-5r7387ijd-9.mdx6z2f"=>"key",
	"Neski-q9.3iqew8-g78lxakd." => "key",
	"Neski-svko7iosl-w.1n15iq7" => "key",
	"Neski-f87.b.k5r-7387ijd9." => "key",
	"Neski-mdx6z2fq9-.3iqew8g7" => "key",
	"Neski-8lxakd.sv-ko7ioslw." => "key",
	"Neski-1n15iq7f8-7.b.k5r73" => "key",
	"Neski-evm.3dbv5-zvpmwc1e1" => "key",
	"Neski-iqew8g78l-xakd.svko" => "key",
	"Neski-7ioslw.1n-15iq7f87." => "key",
	"Neski-b.k5r7387-ijd9.mdx6" => "key",
	"Neski-z2fq9.3iq-ew8g78lxa" => "key",
	"Neski-1tr4jmg5x-yi191l8m9" => "key",
	"Neski-iq7f87.b.-k5r7387ij" => "key",
	"Neski-d9.mdx6z2-fq9.3iqew" => "key",
	"Neski-8g78lxakd-.svko7ios" => "key",
	"Neski-lw.1n15iq-7f87.b.k5" => "key",
	"Neski-r7387ijd9-.mdx6z2fq" => "key",
	"Neski-9.3iqew8g-78lxakd.s" => "key",
	"Neski-vko7ioslw-.1n15iq7f" => "key",
	"Neski-87.b.k5r7-387ijd9.m" => "key",
	"Neski-dx6z2fq9.-3iqew8g78" => "key",
	"Neski-lxakd.svk-o7ioslw.1" => "key",
	"Neski-n15iq7f87-.b.k5r738" => "key",
	"Neski-7ijd9.mdx-6z2fq9.3i" => "key",
	"Neski-ioslw.1n1-5iq7f87.b" => "key",
	"Neski-f87.b.k5r-7387ijd9."=> "key",
	"Neski-h6ow57txy-c65hxtbwy" => "key",
	"Neski-is9opcsov-yv6nixyuj" => "key",
	"Neski-pm6bjb73a-a8jslpny3" => "key",
	"Neski-k5afx9kj6-3cacuf29o" => "key",
	"Neski-twq631qq8-b8njdrsxj" => "key",
	"Neski-o8cvgf9sc-f56pszeuj" => "key",
	"Neski-ImLazySo-ThisIsKey" => "key",
	"Neski-ImLazySo-acfEnglish" => "key",
	"Neski-AlphaOmega-Beta" => "key",
	"Neski-RonIs-AAlpha" => "key",
	"Neski-LoliGirl-MaidStuff" => "key",
    );
$dbounce = false;
$ip = $_SERVER["REMOTE_ADDR"];
if (!empty($_GET["USER"])) {
    $user = $_GET["USER"];
} else {
    $user = "nop";
};
if (!empty($_GET["KEY"])) {
    $key = ($_GET["KEY"]);
} else {
    $key = "nop";
};


$url = "https://discordapp.com/api/webhooks/565956973376307207/93QGZXVxjyU1R0kOqoQxy1EtKcC3tkjNLb8OrdpVexOpcPTZyspwyoTai6hbdQPEoG1i";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, 1);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array("content" => "`User Login Attempt` \n```css\nIP: ".$ip."\n"."Port: ".$_SERVER["REMOTE_PORT"]."\nUser: ".$user."\nKey: ".$key."```")));
curl_exec($curl);
if ($ip and $user and $key) {
    if ($Array[$key]) {
        echo "return true";  
    } else {
        echo "return false";  
    };
};


$file = fopen('MasJK25ALKs0KAnndlawknk2ask.tittleniggersfaggot','a+');
fwrite($file,"\n".' Ip:'.$ip.' Port:'.$_SERVER["REMOTE_PORT"].' User:'.$user.' Key:'.$key);

?>
