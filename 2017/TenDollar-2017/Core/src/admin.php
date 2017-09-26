<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body { background-color: #1d1d1d; color: #ffffff; padding: 90px; }
        a { text-decoration: none; color: #61646d; padding-left: 30px; }
        h1 { display: inline-block; color: #b20000;}
    </style>
    <title>ADMIN</title>
</head>
<body>
<?php
    @include 'config.php';

    print("<h1>Admin Page</h1>");
    print("<img src='files/worker.png'>"); 
    print("<br>Our website is still under construction. Sorry for the inconvenience...");
    @exec("ls files/",$list);

    $del = isset($_GET['del']) ? $_GET['del'] : false;
    if($del) {
        if(@preg_match("/\*/i", $_GET['del'])) exit("Access Denied!");
        if(@strlen($del) <= 3) {
            @system("rm -f files/$_GET[del]");
        }
    }
    print("<h2>Lists...</h2>");
    for($i=0;$i<count($list);$i++) {
        print("<a href='?del=$list[$i]' onclick='alert(\"Unimplemented :(\");'>[DEL]</a> $list[$i]<br>");
    }
?>
</body>
</html>
