<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'FOOD');
   
    $filtered_category = mysqli_real_escape_string($link, $_POST['category']);

    if($filtered_category == "all"){
        $query = "SELECT prdlstNm, rawmtrl, allergy, category FROM food_2";
    }
    else{
        $query = "SELECT prdlstNm, rawmtrl, allergy, category FROM food_2  WHERE category LIKE '%{$filtered_category}%'";
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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>카테고리</title>
</head>

<body>
    <h2><a href="index.php">index</a></h2>
    <form action="all_process.php" method="POST">

    <br>
      <input type="text" name="nutrient" placeholder="nutrient_name">
      <br>
      <input type="radio" name="allergy" value="대두">대두
      <input type="radio" name="allergy" value="땅콩">땅콩
      <input type="radio" name="allergy" value="밀">밀
      <input type="radio" name="allergy" value="쇠고기">쇠고기
      <input type="radio" name="allergy" value="돼지고기">돼지고기
      <input type="radio" name="allergy" value="닭고기">닭고기
      <input type="radio" name="allergy" value="새우">새우
      <input type="radio" name="allergy" value="오징어">오징어
      <input type="radio" name="allergy" value="우유">우유
      <input type="radio" name="allergy" value="조개">조개
      <input type="radio" name="allergy" value="토마토">토마토
      <input type="radio" name="allergy" value="선택없음">선택없음
      <input type="hidden" name="category" value=<?=$filtered_category?>>
      <br>
      <br>
      <input type="submit" value="Search">
    </form>      
    
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