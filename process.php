<?php

require('db.php');

function genRandomStr()
{
    $str = "abcdefghijklmnopqrstuvwxyz" . time();
    $str = str_shuffle($str);
    $str = str_split($str, 1);
    $short = "";
    for ($i = 0; $i < 4; $i++) {
        $short .= $str[rand(0, count($str) - 1)];
    }

    return $short;
}

function shortLink($longurl)
{
    $db = $GLOBALS['db'];

    $response = [];
    if ($longurl == '') {
        $response['msg'] = "Long url is blank";
        $response['status'] = false;
        return json_encode($response);
    }

    if (!filter_var($longurl, FILTER_VALIDATE_URL)) {
        $response['msg'] = "Url is not valid !";
        $response['status'] = false;
        return json_encode($response);
    }

    $short = genRandomStr();
    $validshort = false;
    while (!$validshort) {
        $insertQuery = "INSERT INTO links(long_url, short_url) VALUES('$longurl','$short')";
        if ($db->query($insertQuery)) {
            $selectQuery = "SELECT * FROM links WHERE short_url = '$short'";
            $links = $db->query($selectQuery)->fetch_assoc();
            $response['msg'] = "Url shorted";
            $response['status'] = true;
            $response['shorted'] = $links["short_url"];
            $response['longurl'] = $links["long_url"];
        } else {
            $response['msg'] = "Something went wrong";
            $response['status'] = false;
        }
        return json_encode($response);
    }
}

if (isset($_POST['longurl'])) {
    $longurl = mysqli_real_escape_string($db, $_POST['longurl']);
    $v = shortLink($longurl);
    echo $v;
}
