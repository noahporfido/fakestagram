<head>
    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/celine.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="/js/script.js"></script>
    <link rel="icon" href="images/logo.png">
</head>
<div id="StartseiteContainer">
    <p id="StartseiteText">fakestagram</p>
    <form id="Login" method="post" accept-charset="UTF-8" action="/home/login">
        <div>
            <input id="BenutzernameLabel" type="text" placeholder="Enter Username" name="uname" required>
        </div>
        <br/>
        <input id="PasswortLabel" type="password" placeholder="Enter Password" name="psw" required>
        <br/>
        <input id="LoginButton" type="submit">
    </form>
</div>
