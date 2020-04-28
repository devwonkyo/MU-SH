<?php
session_start();
include './model/BoardModel.php';
$subject = $_POST['subject'];
$userId = $_SESSION['userId'];
$content = $_POST['content'];
if(isset($_POST['videoLink'])){
    $videoLink = $_POST['videoLink'];
}else{
    $videoLink = null;
}

$date = date("Y-m-d");
$filevalue = null;

foreach ($_FILES['upfile'] as $value) {
    $filevalue = $value;
}



if($filevalue != null){

    $upfile_name = $_FILES['upfile']['name'];
    $upfile_tmp_name = $_FILES['upfile']['tmp_name'];
    $upfile_type = $_FILES['upfile']['type'];
    $upfile_size = $_FILES['upfile']['size'];
    $upfile_error = $_FILES['upfile']['error'];

    $file = explode(".",$upfile_name);
    $file_name =file[0];
    $file_ext =file[1];

    $upload_dir = '/var/www/html/img/';
    $allowed_ext = array('jpg','jpeg','gif','png');

    if(!$upfile_error){
        $new_file_name =date('Y_m_d_H_i_S');
        $copied_file_name = $new_file_name.".".$file_name;
        /*echo $copied_file_name;
        exit;*/
        $uploaded_file = $upload_dir.$copied_file_name;

        if($upfile_size>5000000){
            print("<script>
            alert('업로드 파일 크기가 지정된 용량(5MB)를 초과합니다.<br> 파일 크기를 체크해주세요.'); history.back();
                </script>");
            exit;
        }

        if(($upfile_type!='image/gif')&&($upfile_type!='image/jpeg')){
            print("<script>
            alert('jpg,gif 파일만 업로드 가능합니다.'); history.back();
                </script>");
            exit;
        }

        if(!move_uploaded_file($upfile_tmp_name,$uploaded_file)){
            print("<script>
            alert('지정된 파일 위치로 복사하는 데 실패했습니다.'); history.back();
                </script>");
            exit;
        }


    }else{
        print("<script>
            alert('파일 에러 '); history.back();
                </script>");
        exit;
    }
}else{
    $upfile_name = null;
    $copied_file_name = null;
}


$insertModel =new BoardModel();

$result = $insertModel->insertContent($userId,$subject,$content,$date,'0',$upfile_name,$copied_file_name,$videoLink);

if($result){
    echo "<script>alert('게시물을 등록했습니다.');";
    echo "window.location.replace('board.php');</script>";
    exit;
}else{
    echo "<script>alert('error');";
    echo "window.location.replace('board.php');</script>";
    exit;
}

?>