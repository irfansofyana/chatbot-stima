<?php
session_start();
if(isset($_POST['text'])){
    $resbotmsg = exec("python chatbot.py "+$_POST['text']);
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".'io'."</b>: ".stripslashes(htmlspecialchars($resbotmsg))."<br></div>");
    fclose($fp);
}
?>