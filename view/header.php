<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <!-- alle Script und Styles werden eingebunden -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/hinzufuegen.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="/js/script.js"></script>
    <link rel="icon" href="/images/logo.png">
</head>

<body>
    <div id="navigation"> <!--Navigation with Logo and Buttons-->
        <a href="/">
            <img src="/images/logo.png" id="logo" alt="logo">
        </a>
        <div id="logo_schrift_div">
            <h3 id="logo_schrift">Fakestagram</h3>
        </div>
        <img src="/images/profil.png" id="profil" alt="profil">
        <a href="/bild/hinzufuegen">
            <img src="/images/upload.svg" id="upload" alt="upload">
        </a>
        <div id="suche">
            <div id="suchergebnis">

            </div>
            <p id="placeholder" onclick="suchenclick()" >Suchen</p>
            <div id="border"></div>
            <input id="suchenfeld">
        </div>
    </div>

    
    <!-- Damit die Suche überall funktioniert wird der HTML Coder für die Bildanzeige direkt in den header eingebunden -->
    <div id="anzeige_background">
        <div id="close" onclick="schliessen()"></div>
        <div id="left">
            <img id="left_img" src="/images/left-arrow.svg" onclick="next(-2)" alt="previous">
        </div>
        <div id="right">
            <img id="right_img" src="/images/right-arrow.svg" onclick="next(0)" alt="next">
        </div>
        <div id="anzeige">
            <h3 id="anzeige_titel"></h3>
            <img src="/uploadimages/meer.jpg" id="anzeige_bild" alt="Akuelles Bild">
            <div id="anzeige_text_div">
                <p id="anzeige_text"></p>
            </div>
        </div>
    </div>
