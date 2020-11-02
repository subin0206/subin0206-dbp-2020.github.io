<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'APP');
    
    if(isset($_GET['genres'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['genres']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['genres']);        
    }
    if(isset($_GET['order'])){
        $filtered_order= mysqli_real_escape_string($link, $_GET['order']);
    } else {
        $filtered_order = mysqli_real_escape_string($link, $_POST['order']);        
    }
    if(isset($_GET['content_rating'])){
        $filtered_content= mysqli_real_escape_string($link, $_GET['content_rating']);
    } else {
        $filtered_content = mysqli_real_escape_string($link, $_POST['content_rating']);
    }
    $filtered_type = mysqli_real_escape_string($link, $_POST['type']);
    if($filtered_content=='not'){
        $query = "SELECT * FROM APP WHERE type = '{$filtered_type}' and genres = '{$filtered_id}' ORDER BY {$filtered_order} DESC" ;
    }
    else if($filtered_type =='free'){
        $query = "SELECT * FROM APP WHERE type = 'Free' and genres = '{$filtered_id}' and content_rating = '{$filtered_content}' ORDER BY {$filtered_order} DESC" ;

    }else if($filtered_type=='paid'){
        $query = "SELECT * FROM APP WHERE type = 'Paid' and genres = '{$filtered_id}'  and content_rating = '{$filtered_content}' ORDER BY {$filtered_order} DESC" ;
        
    }else if($filtered_type=='all'){
        $query = "SELECT * FROM APP WHERE genres = '{$filtered_id}' and content_rating = '{$filtered_content}' ORDER BY {$filtered_order} DESC";
    }
    if($filtered_type=='all' && $filtered_content=='not'){
        $query = "SELECT * FROM APP WHERE genres = '{$filtered_id}' ORDER BY {$filtered_order} DESC";
    }
    $result = mysqli_query($link, $query);
    $app_info = '';
    while($row = mysqli_fetch_array($result)) {
      $app_info .= '<tr>';
      $app_info .= '<td>'.$row['name'].'</td>';
      $app_info .= '<td>'.$row['category'].'</td>';
      $app_info .= '<td>'.$row['rating'].'</td>';
      $app_info .= '<td>'.$row['reviews'].'</td>';
      $app_info .= '<td>'.$row['size'].'</td>';
      $app_info .= '<td>'.$row['installs'].'</td>';    
      $app_info .= '<td>'.$row['type'].'</td>';    
      $app_info .= '<td>'.$row['price'].'</td>';    
      $app_info .= '<td>'.$row['content_rating'].'</td>';    
      $app_info .= '<td>'.$row['genres'].'</td>';    
      $app_info .= '<td>'.$row['last_update'].'</td>';    
      $app_info .= '<td>'.$row['current_version'].'</td>';    
      $app_info .= '<td>'.$row['android_version'].'</td>';    
      $app_info .= '</tr>';
    }
    //print_r($row);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>googleplaystore</title>
</head>

<body>
    <h2><a href="index.php">구글 플레이 스토어 검색</a> | 장르 조회</h2>
    <table border="1">
        <tr>
            <th>name</th>
            <th>category</th>
            <th>rating</th>
            <th>reviews</th>
            <th>size</th>
            <th>installs</th>
            <th>type</th>
            <th>price</th>
            <th>content_rating</th>
            <th>genres</th>
            <th>last_update</th>
            <th>current_version</th>
            <th>android_version</th>
        </tr>
        <?= $app_info ?>

    </table>
</body>

</html>