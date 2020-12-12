<?php
    $link = mysqli_connect('localhost', 'admin','admin','employees');
    if(mysqli_connect_error()){
        echo "관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    $filtered_number = mysqli_real_escape_string($link, $_GET['number']);
    $query = "
        SELECT first_name, last_name, title,salary, titles.from_date as from_date,titles.to_date as to_date
        FROM titles 
        LEFT JOIN employees on titles.emp_no=employees.emp_no
        LEFT JOIN salaries on salaries.emp_no=titles.emp_no
        order by salary DESC LIMIT ".$filtered_number
        ;
    
    $result = mysqli_query($link, $query);
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['salary'];
        $article .= '</td><td>';
        $article .= $row['title'];
        $article .= '</td><td>';
        $article .= $row['from_date'];
        $article .= '</td><td>';
        $article .= $row['to_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charest = "utf-8">
        <title>연봉 정보</title>
        <style>
            body{ 
                font-family: Consolas, monospace;
                font-family: 12px;
            }
            table{
                width: 100%;
            }               
            th,td{
                padding: 10px;
                border-bottom: 1px solid #dadada;
            } 
        </style>
    </head>
    <body>
        <h2><a href = "index.php">직원 관리 시스템</a> | 연봉 정보</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>salary</th>
                <th>title</th>
                <th>from_date</th>
                <th>to_date</th>
            </tr>
            <?=$article?>

        </table>
    </body>
</html>