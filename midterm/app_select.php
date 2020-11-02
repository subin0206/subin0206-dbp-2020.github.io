<?php
    $link = mysqli_connect("localhost","admin","admin","APP");
    $filtered_count = mysqli_real_escape_string($link, $_POST['count']);
    $filtered_order = mysqli_real_escape_string($link, $_POST['order']);
    if($filtered_count == NULL) $filtered_count = 10;
    if($filtered_order =='reviews'){
        $query = "SELECT * FROM APP ORDER BY reviews DESC limit {$filtered_count}";

    }else if($filtered_order=='rating'){
        $query = "SELECT * FROM APP ORDER BY rating DESC limit {$filtered_count}";

    }
    $result = mysqli_query($link, $query);
    // print_r($result);
    // print_r($row);
    //fetch_array 한줄씩 나옴
    $app_info = '';
    while($row = mysqli_fetch_array($result)){
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
    };

?>
<!DoCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>직원 관리 시스템</title>
</head>
<body>
    <h2><a href = "index.php">구글 플레이 스토어 검색 </a>| 어플 조회</h2>
    <table border ="1"> 
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
</body>
    </html>