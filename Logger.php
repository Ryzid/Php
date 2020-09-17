<?php
$user =$_GET["user"];
$ext =$_GET["ext"];
$url = "https://discordapp.com/api/webhooks/594306057510191118/fvblxRfE0r95X9V5eG0IPromZ9idnjZ3ktOBcsEHW6Z3TMkQm2h9kYDVDX0h7kQlI6AZ";

$hookObject = json_encode([
    "content" => "User Login Attempt",
    "username" => "ar8 logger",
    "avatar_url" => "",
    "tts" => false,
    "embeds" => [
        [
            // Set the title for your embed
            "title" => "Eski's Logger",

            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",

            // A description for your embed
            "description" => "a User has attempted Login.",

            // The URL of where your title will be a link to
            "url" => "",

            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
			 //$datetime = new DateTime('17 Oct 2008');
            //"timestamp" => $datetime->format('c');

            // The integer color to be used on the left side of the embed
            "color" => hexdec( "FF0000" ),

            // Author object
            "author" => [
                "name" => "Login",
                "url" => "https://www.eskihosting.xyz"
            ],

            // Field array of objects
            "fields" => [
                // Field 1
                [
                    "name" => "Username",
                    "value" => $user,
                    "inline" => false
                ],
                // Field 3
                [
                    "name" => "IP",
                    "value" => $_SERVER['REMOTE_ADDR'],
                    "inline" => true
                ],
				[
                    "name" => "Extension: ",
                    "value" => $ext,
                    "inline" => true
                ],
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Length" => strlen( $hookObject ),
        "Content-Type" => "application/json"
    ]
]);

$response = curl_exec( $ch );
curl_close( $ch );
?>
