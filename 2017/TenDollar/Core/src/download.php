<?php
    $file = isset($_GET['file']) ? $_GET['file'] : false;
    if($file) {
        if(@preg_match("/Core/i", $_GET['file'])) exit("Access Denied!");
        $_GET['file'] = str_replace("../", "", $_GET['file']);

        $split_path = @explode("/", $_GET['file']);
        $path = "";
        for($i=0;$i<count($split_path)-1;$i++) {
            $path .= $split_path[$i]."/";
        }
        $real_path = realpath('files/'.$path);
        if(strpos($real_path, "Core") === false) exit("Access Denied!");
        @$file_path = "files/".$_GET['file'].".php";

        $filesize = @filesize($file_path);
        $path_parts = @pathinfo($file_path);
        $filename = $path_parts['basename'];
        $extension = $path_parts['extension'];

        if(!$filesize) exit("Not Found");
        header("Pragma: public");
        header("Expires: 0");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: $filesize");
        ob_clean();
        flush();
        readfile($file_path);
    } else {
        print("Access Denied!");
    }
?>
