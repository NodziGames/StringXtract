<html>
    <head>
        <title>StringXtract</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <center><img src="images/StringXtract.png"></center>
    </head>
    <center><div id="main_box" class="box">
<?php

$BUFFER_SIZE = 1000000; //Maximum bytes read from file.

if ($_FILES['file']['error'] > 0)
{
    echo "Error: " . $_FILES['file']['error'] . "<br />";
}
else
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $filetype = pathinfo($target_file, PATHINFO_EXTENSION);
    if ($filetype != "xml")
    {
        echo "This Is Not An XML File!";
        return ;
    }
    if (file_exists($target_file))
    {
        echo "Sorry, a file with this name already exists!";
        return ;
    }
    
    if ($_FILES["file"]["size"] > $BUFFER_SIZE)
    {
        echo "The File Is Too Large To Upload.";
        return ;
    }
    
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
    {
        echo "An unexpected error occured. It's a bug, not a feature...";
        return ;
    }
    
    echo "<hr><br><br><h2>" . str_replace("uploads/", "", $target_file) . "</h2>";
    $file_handle = fopen($target_file, "r");
    echo "<table>";
    while (($line = fgets($file_handle)) !== false)
    {
        $i = strpos($line, 'strValue="'); //Find Where The String Is Located On The Line, Return Index Of It
        if ($i !== FALSE) //strpos returns false if no string is found
        {
            echo "<tr>";
            $i_id = strpos($line, 'id="');
            $i_id += 4;
            $i_id2 = $i_id;
            while ($line[$i_id2] != '"')
            {
                $i_id2++;
            }
            $final_idstring = substr($line, $i_id, $i_id2 - $i_id);
            echo "<td align='left'><label unselectable='on' class='unselectable'>" . htmlspecialchars($final_idstring) . "</label></td>";
            $i += 10; //Skip Past strValue" to reach first character of wanted string.
            $i2 = $i; //Create Second Index That Will Move To End Of Wanted String
            while ($line[$i2] != '"') //Increment Index To End Of String.
            {
                $i2++;
            }
            $final_string = substr($line, $i, $i2 - $i); //Take String From Line
            echo "<td align='right'>" . htmlspecialchars($final_string) . "<br></td>"; //Echo out the string, escaping the HTML tags and ending with a line break
            echo "</tr>";
        }
        else
        {
            echo "</table>";
            echo "<label unselectable='on' class='unselectable'>";
            $line = trim($line);
            
            //FIND LANGUAGE TAGS AND ECHO IT OUT
            
            if ($line == "<bg>")
            {
                echo "<br><br><hr>Bulgarian (BG)<hr>";
            }
            else if ($line == "<cs>")
            {
                echo "<br><br><hr>Czech (CS)<hr>";
            }
            else if ($line == "<da>")
            {
                echo "<br><br><hr>Danish (DA)<hr>";
            }
            else if ($line == "<de>")
            {
                echo "<br><br><hr>German (DE)<hr>";
            }
            else if ($line == "<el>")
            {
                echo "<br><br><hr>Greek (EL)<hr>";
            }
            else if ($line == "<es>")
            {
                echo "<br><br><hr>Spanish (ES)<hr>";
            }
            else if ($line == "<fi>")
            {
                echo "<br><br><hr>Finnish (FI)<hr>";
            }
            else if ($line == "<fr>")
            {
                echo "<br><br><hr>French (FR)<hr>";
            }
            else if ($line == "<hi>")
            {
                echo "<br><br><hr>Hindi (HI)<hr>";
            }
            else if ($line == "<hr>")
            {
                echo "<br><br><hr>Croation (HR)<hr>";
            }
            else if ($line == "<hu>")
            {
                echo "<br><br><hr>Hungarian (HU)<hr>";
            }
            else if ($line == "<id>")
            {
                echo "<br><br><hr>Indonesian (ID)<hr>";
            }
            else if ($line == "<it>")
            {
                echo "<br><br><hr>Italian (IT)<hr>";
            }
            else if ($line == "<ja>")
            {
                echo "<br><br><hr>Japanese (JA)<hr>";
            }
            else if ($line == "<ko>")
            {
                echo "<br><br><hr>Korean (KO)<hr>";
            }
            else if ($line == "<nl>")
            {
                echo "<br><br><hr>Dutch (nl)<hr>";
            }
            else if ($line == "<no>")
            {
                echo "<br><br><hr>Norwegian (NO)<hr>";
            }
            else if ($line == "<pl>")
            {
                echo "<br><br><hr>Polish (PL)<hr>";
            }
            else if ($line == "<pt-br>")
            {
                echo "<br><br><hr>Portuguese Brazillian (PT-BR)<hr>";
            }
            else if ($line == "<pt>")
            {
                echo "<br><br><hr>Portuguese (PT)<hr>";
            }
            else if ($line == "<ru>")
            {
                echo "<br><br><hr>Russian (RU)<hr>";
            }
            else if ($line == "<sk>")
            {
                echo "<br><br><hr>Slovak (SK)<hr>";
            }
            else if ($line == "<sl>")
            {
                echo "<br><br><hr>Slovene (SL)<hr>";
            }
            else if ($line == "<sv>")
            {
                echo "<br><br><hr>Swedish (SV)<hr>";
            }
            else if ($line == "<th>")
            {
                echo "<br><br><hr>Thai (TH)<hr>";
            }
            else if ($line == "<tr>")
            {
                echo "<br><br><hr>Turkish (TR)<hr>";
            }
            else if ($line == "<vi>")
            {
                echo "<br><br><hr>Vietnamese (VI)<hr>";
            }
            else if ($line == "<zh-cn>")
            {
                echo "<br><br><hr>Chinese Simplified (ZH-CN)<hr>";
            }
            else if ($line == "<zh-tw>")
            {
                echo "<br><br><hr>Chinese Traditional (ZH-TW)<hr>";
            }
            
            echo "</label>";
            echo "<table>";
        }
    }
}

echo "<br><br><br><br><br><br>";


?>
        </div></center>
    <footer>
        <form action='cleanup.php' method='post'><input id='back' class='button' type='submit' value='<-- Back' name='submit'></form>
    </footer>
</html>