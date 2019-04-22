<?php
//awal mulai
session_start ();
function loginForm() {
    echo '
   <div id="loginform">
   <form action="index.php" method="post">
       <p>Please enter your name to continue:</p>
       <label for="name">Name:</label>
       <input type="text" name="name" id="name" />
       <input type="submit" name="enter" id="enter" value="Enter" />
   </form>
   </div>
   ';
}

//aksi enter
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $fp = fopen ( "log.html", 'a' );
        fwrite ( $fp, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat session.</i><br></div>" );
        $initbotmsg = ("Halo, ".$_POST ['name']."! apa yang ingin kau tanyakan?");
        fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".'io'."</b>: ".stripslashes(htmlspecialchars($initbotmsg))."<br></div>");
        fclose ( $fp );
    } else {
        echo '<span class="error">Please type in a name</span>';
    }
}

//aksi logout
if (isset ( $_GET ['logout'] )) {

    // Simple exit message
    $fp = fopen ( "log.html", 'a' );
    fwrite ( $fp, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $fp );

    session_destroy ();
    header ( "Location: index.php" ); // Redirect the user
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<html lang="en" class="h-100">
    <title>Chatbot io</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="mainView.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="style.css" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Chatbot io</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="profile.php">About Us<span class="sr-only">(current)</span></a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        -->
      </ul>
        <!--
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        -->
    </div>
  </nav>
</header>

<style>

form,p,span {
    margin: 0;
    padding: 0;
}

input {
    font: 12px arial;
}

a {
    color: #0000FF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

#wrapper,#loginform {
    margin: 0 auto;
    padding-bottom: 25px;
    background: #EBF4FB;
    width: 504px;
    border: 1px solid #ACD8F0;
    text-align: center;
}

#loginform {
    padding-top: 18px;
}

#loginform p {
    margin: 5px;
}

#chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 25px;
    padding: 10px;
    background: #fff;
    height: 270px;
    width: 430px;
    border: 1px solid #ACD8F0;
    overflow: auto;
}

#usermsg {
    width: 395px;
    border: 1px solid #ACD8F0;
}

#submit {
    width: 60px;
}

.error {
    color: #ff0000;
}

#menu {
    padding: 12.5px 25px 12.5px 25px;
}

.welcome {
    float: left;
}

.logout {
    float: right;
}

.msgln {
    margin: 0 0 2px 0;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

.left {
  width: 25%;
}

.right {
  width: 75%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>

<body>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">

<div class="row">
  <div class="column left">
        <img src="kisspng-avatar-internet-bot-chatbot-help-desk-clip-art-chatbot-avatar-5b3f3b57546fa1.5619835015308706153459.png" width="100%" height="100%">
  </div>
  <div class="column right">
    <div class="container" >
        <br>
        <br>
        <h1 class="mt-5">Say Hello to io!</h1>
        <!--<p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>-->
        <p class="lead">This chatbot was made by the power of bootstrap and our remarkable development capabilites. Enjoy!</p>
            <!--<p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>-->
    </div>
  </div>
</div>
  


    <?php
    if (! isset ( $_SESSION ['name'] )) {
        loginForm ();
    } else {
        ?>
<!-- Chatbox -->
<div id="wrapper">
        <div id="menu">
            <p class="welcome">
                Welcome, <b><?php echo $_SESSION['name']; ?></b>
            </p>
            <p class="logout">
                <a id="exit" href="#">Exit Chat</a>
            </p>
            <div style="clear: both"></div>
        </div>
        <div id="chatbox"><?php
        if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
            $handle = fopen ( "log.html", "r" );
            $contents = fread ( $handle, filesize ( "log.html" ) );
            fclose ( $handle );

            echo $contents;
        }
        ?></div>

        <form name="message" action="index.php" method="post">
            <input name="usermsg" type="text" id="usermsg" size="63" /> <input
                name="submitmsg" type="submit" id="submitmsg" value="Send" />
        </form>
    </div>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});

//jQuery Document
$(document).ready(function(){
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true){window.location = 'index.php?logout=true';}
    });
});

//If user submits the form
$("#submitmsg").click(function(){
        // alert("submit");
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});
        $("#usermsg").attr("value", "");

        $.post("exec.php", {usermsg: clientmsg});

        loadLog;
    return false;
});

function loadLog(){
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){
            $("#chatbox").html(html); //Insert chat log into the #chatbox div

            //Auto-scroll
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }
        },
    });
}

setInterval (loadLog, 1000);
</script>
<?php
    }
    ?>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
</script>

</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Copyright of Chatbot Group</span>
  </div>
</footer>
</body>
</html>
