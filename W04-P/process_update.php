<?php
    $link = mysqli_connect('localhost','root','20172025','hw01');
    $filtered = array(
        'id' =>mysqli_real_escape_string($link, $_POST['id']),
        'title' => mysqli_real_escape_string($link,$_POST['title']),
        'description'=> mysqli_real_escape_string($link, $_POST['description'])
    );
    $query = "
    UPDATE MEMO
    SET
        title = '{$filtered['title']}',
        description = '{$filtered['description']}'
    WHERE
        id = '{$filtered['id']}'

    ";
    $result = mysqli_query($link, $query);
    if($result == false){
        echo '수정하는 과정에서 문제가 발생했습니다. ,관리자에게 문의하세요';
        // error_log(mysql_error($link));
    }
    else{ 
        echo '성공했습니다. <a href = "index.php"> 돌아가기 </a>';
    }
?>