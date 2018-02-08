<?php

//Cleanup is a script that collects all files from the uploads folder and deletes them to prevent conflicts. This ought not be necessary as cleanup runs automatically when a user clicks the back button.

$files = glob('uploads/*');

echo "Cleaning Files...";

foreach ($files as $file)
{
    if (is_file($file))
    {
        unlink($file);
    }
}

header('Location: index.php');


?>