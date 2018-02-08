<html>
    <head>
        <title>StringXtract</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <center><a href="index.php"><img src="images/StringXtract.png"></a></center>
    </head>
    <body>
        <center><div id="main_box" class="box">
            <img src="images/splash.jpg" id="splash" width="250"><br><br><br><br>
            <center><h1>Upload an XML file to extract the string values from:</h1></center>
            <hr><br>
            <center><form action="process.php" method = "post" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="inputfile">
                <br><br><br><br>
                <input type="submit" value="Rip Strings" name="submit" class="button">
            </form></center>
            <br><br><br><br><br><br><br><br><br>
            <center><form action="cleanup.php" method="post"><hr>
                <p1>Having Issues Uploading Files? Try Running A Cleanup!</p1><br><br>
                <input class="button" type="submit" name="cleanup" value="Cleanup">
            </form></center>
        </div></center>
    </body>
    <footer>
    </footer>
</html>