<?php
    $link = mysqli_connect("localhost","admin","admin","employees");
    $filtered_count = mysqli_real_escape_string($link, $_POST['count']);
    $filtered_order = mysqli_real_escape_string($link, $_POST['order']);
    if($filtered_count == NULL) $filtered_count = 10;
    if($filtered_order =='ascending'){
        $query = "SELECT * FROM employees ORDER BY emp_no limit {$filtered_count}";

    }else if($filtered_order=='descending'){
        $query = "SELECT * FROM employees ORDER BY emp_no DESC limit {$filtered_count}";

    }
    $result = mysqli_query($link, $query);
    // print_r($result);
    // print_r($row);
    //fetch_array 한줄씩 나옴
    $emp_info = '';
    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['emp_no'].'</td>';
        $emp_info .= '<td>'.$row['birth_date'].'</td>';
        $emp_info .= '<td>'.$row['first_name'].'</td>';
        $emp_info .= '<td>'.$row['last_name'].'</td>';
        $emp_info .= '<td>'.$row['gender'].'</td>';
        $emp_info .= '<td>'.$row['hire_date'].'</td>';
        $emp_info .= '<td><a href = "emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .= '<td><a href = "emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
        $emp_info .= '</tr>';
    };

?>
<!DoCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>직원 관리 시스템</title>
</head>
<body>
    <h2><a href = "index.php">직원 관리 시스템 </a>| 직원 정보 조회</h2>
    <table border ="1"> 
    <tr>
        <th>emp_no</th>
        <th>birth_date</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>gender</th>
        <th>hire_date</th>
        <th>update</th>
        <th>delete</th>
    </tr>
    <?=$emp_info?>
</body>
    </html>