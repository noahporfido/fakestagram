<head>
    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <script src="js/login.js"></script>
</head>
<div id="StartseiteContainer">
    <p id="StartseiteText">fakestagram</p>
    <div>
        <input id="BenutzernameLabel" onfocus="Placeholder('BenutzernameLabel')" onblur="Placeholderadd(BenutzernameLabel)" type="text" placeholder="Enter Username" name="uname" required>
    </div>
    <br/>
    <input id="PasswortLabel" type="password" placeholder="Enter Password" name="psw" required>
    <br/>
    <button id="LoginButton" type="submit">Login</button>
</div>
