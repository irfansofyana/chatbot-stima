<?php
if(isset($_POST['usermsg'])){
  exec("python chatbot.py ".$_POST['usermsg'],$temp);
  $resbotmsg = join('<br>',$temp);
}
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".'io'."</b>: ".stripslashes($resbotmsg)."</div>");
fclose($fp);
?>
