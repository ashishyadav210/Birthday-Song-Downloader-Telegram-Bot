<?php
include "config.php";

$update = json_decode(file_get_contents("php://input"), true);

if(isset($update["message"])){

    $chat_id = $update["message"]["chat"]["id"];
    $user_id = $update["message"]["from"]["id"];
    $text = trim($update["message"]["text"] ?? "");

    saveUser($chat_id);

    if($text == "/start"){
        sendMessage($chat_id,
        "🎉 *Welcome to Birthday Song Bot* 🎶\n\n".
        "👉 *Send Name*\n".
        "_The name on which the birthday song is to be made_ 🎂");
    }

    elseif($text == "/broadcast" && $user_id == $ADMIN_ID){
        file_put_contents("broadcast.txt", "waiting");
        sendMessage($chat_id,"📢 Send message to broadcast:");
    }

    elseif(file_exists("broadcast.txt") && file_get_contents("broadcast.txt")=="waiting" && $user_id==$ADMIN_ID){
        unlink("broadcast.txt");
        broadcast($text);
        sendMessage($chat_id,"✅ Broadcast sent successfully!");
    }

    elseif(!empty($text)){
        if(!isJoined($user_id)){
            forceJoin($chat_id);
            return;
        }

        $name = ucfirst(strtolower($text));
$mp3 = "https://s3-us-west-2.amazonaws.com/1hbcf/$name.mp3";

$headers = @get_headers($mp3);

if($headers && strpos($headers[0], '200')){
    sendAudio($chat_id,$mp3,"🎂 Happy Birthday *$name* 🎉");
} else {
    sendMessage($chat_id,
        "❌ *Sorry!*\n\n".
        "The birthday song for the name *$name* is not available.\n".
        "Please try another name."
    );
}

    }
}

elseif(isset($update["callback_query"])){
    $chat_id = $update["callback_query"]["message"]["chat"]["id"];
    $user_id = $update["callback_query"]["from"]["id"];

    if(isJoined($user_id)){
        sendMessage($chat_id,
        "✅ *Verified Successfully!*\n\n".
        "👉 Send Name 🎶");
    }else{
        sendMessage($chat_id,"❌ Must Join All Social Media Pages...!!");
    }
}

/* ===== FUNCTIONS ===== */

function sendMessage($id,$msg){
    global $API;
    file_get_contents($API."sendMessage?chat_id=$id&text=".urlencode($msg)."&parse_mode=Markdown");
}

function sendAudio($id,$audio,$cap){
    global $API;
    file_get_contents($API."sendAudio?chat_id=$id&audio=$audio&caption=".urlencode($cap)."&parse_mode=Markdown");
}

function isJoined($user_id){
    global $API,$CHANNEL_ID;
    $res = json_decode(file_get_contents($API."getChatMember?chat_id=$CHANNEL_ID&user_id=$user_id"),true);
    return in_array($res["result"]["status"],["member","administrator","creator"]);
}

function forceJoin($id){
    global $CHANNEL_LINK,$YT,$IG;
    $keyboard = json_encode([
        "inline_keyboard"=>[
            [["text"=>"Subscribe Channel","url"=>$YT],
            ["text"=>"Follow Me On IG","url"=>$IG]],
            [["text"=>"Join Telegram Channel","url"=>$CHANNEL_LINK]],
            [["text"=>"✅ Verify","callback_data"=>"verify"]]
        ]
    ]);

    file_get_contents($GLOBALS['API']."sendMessage?chat_id=$id&text=".urlencode(
        "❌ *Must Join All Social Media Pages...!!*"
    )."&parse_mode=Markdown&reply_markup=$keyboard");
}

function saveUser($id){
    if(!file_exists("users.txt")) file_put_contents("users.txt","");
    $users = file("users.txt",FILE_IGNORE_NEW_LINES);
    if(!in_array($id,$users)){
        file_put_contents("users.txt",$id."\n",FILE_APPEND);
    }
}

function broadcast($msg){
    global $API;
    $users = file("users.txt",FILE_IGNORE_NEW_LINES);
    foreach($users as $id){
        file_get_contents($API."sendMessage?chat_id=$id&text=".urlencode($msg));
    }
}
