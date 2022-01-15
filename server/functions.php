<?php

function read($filename)
{
    // $fp = fopen($filename, 'a');
    // fwrite($fp, $course);
    // fclose($fp);
}
function courseContent($sql)
{
    include_once 'database.php';

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $content = $row['content'];
        echo "<h3>Course content</h3>";
        $file1 = fopen($content, "r");
        while (!feof($file1)) {
            $line1 = fgets($file1);
            echo $line1 . "<br>";
        }
        return true;
    }
    return false;
}
