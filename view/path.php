<div id='path'>
    Ti trovi in: <?php echo $path . "\n"; ?>
    <?php
    session_start();
    if (!isset($_SESSION["username"]))
    {
        echo("\t\t<form method='post' action='connettiti.php'>\n" .
            "\t\t\t<div>\n" .
            "\t\t\t\t<input type='hidden' name='destination' value='" . $_SERVER["REQUEST_URI"] . "' />\n" .
            "\t\t\t\t<button type='submit'>Connettiti</button>\n" .
            "\t\t\t</div>\n" .
            "\t\t</form>\n");
    }
    else
    {
        echo("\t\t<form method='post' action='logout.php'>\n" .
            "\t\t\t<div>\n" .
            "\t\t\t\t<input type='hidden' name='destination' value='" . $_SERVER["REQUEST_URI"] . "' />\n" .
            "\t\t\t\t<button type='submit'>Sconnettiti</button>\n" .
            "\t\t\t</div>\n" .
            "\t\t</form>\n" .
            "\t\t<span id='prova'>Ciao " . $_SESSION['username'] . "!</span>\n");
    }
    ?>
</div>
