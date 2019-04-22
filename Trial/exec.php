<?php
if(isset($_POST['usermsg'])){
  // $resbotmsg = exec("python3 chatbot.py "+$_POST['usermsg']);
  exec("python chatbot.py ".$_POST['usermsg'],$temp);
  $resbotmsg = join(' ',$temp);
  // $resbotmsg = $_POST['usermsg'];
}
// } else {
//   $resbotmsg = "emtpy";
// }
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".'io'."</b>: ".stripslashes(htmlspecialchars($resbotmsg))."<br></div>");
fclose($fp);
?>
