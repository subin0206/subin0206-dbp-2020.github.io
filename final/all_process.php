<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'FOOD');
    
    $filtered_category = '';
    $filtered_nutrient = '';
    $filtered_nutrient = mysqli_real_escape_string($link, $_POST['nutrient']);
    $filtered_category = mysqli_real_escape_string($link, $_POST['allergy']);
    $category = mysqli_real_escape_string($link, $_POST['category']);
    if($filtered_nutrient==null){
        $filtered_nutrient="blank";
    }
    if($category == "all"){
        $query = "SELECT prdlstNm, rawmtrl ,allergy, category FROM food_2 WHERE rawmtrl 
        NOT LIKE '%{$filtered_nutrient}%' and allergy NOT LIKE '%{$filtered_category}%' and rawmtrl NOT LIKE '%{$filtered_category}%'";
    }
    else{
        $query = "SELECT prdlstNm, rawmtrl ,allergy, category FROM food_2 WHERE category LIKE '%{$category}%' and rawmtrl 
        NOT LIKE '%{$filtered_nutrient}%' and allergy NOT LIKE '%{$filtered_category}%' and rawmtrl NOT LIKE '%{$filtered_category}%' ";
    }


    $result = mysqli_query($link, $query);
    $food_info = '';
    while($row = mysqli_fetch_array($result)) {
      $food_info .= '<tr>';
      $food_info .= '<td>'.$row['prdlstNm'].'</td>';
      $food_info .= '<td>'.$row['rawmtrl'].'</td>';
      $food_info .= '<td>'.$row['allergy'].'</td>';
      $food_info .= '<td>'.$row['category'].'</td>';     
      $food_info .= '</tr>';
    }
    //print_r($row);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>카테고리</title>
</head>

<body>
    <h2><a href="index.php">index</a></h2>
   
    <table border="1">
        <tr>
            <th>이름</th>
            <th>성분</th>
            <th>알러지</th>
            <th>카테고리</th>
        </tr>
        <?= $food_info ?>

    </table>
</body>

</html>