<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'APP');

    $query = "SELECT distinct genres FROM APP";
    $query_category = "SELECT distinct category FROM APP";
    $query_content = "SELECT distinct content_rating FROM APP";
    $result = mysqli_query($link, $query);
    $result_category = mysqli_query($link, $query_category);
    $result_content = mysqli_query($link, $query_content);
    $output = "<select name=\"genres\" >\n";
    while($row = mysqli_fetch_array($result)) {
        $value = $row['genres'];
        $output .= "<option value=\"";
        $output .= $value;
        $output .= "\" >";
        $output .= $value;
        $output .= "</option>\n";
    }
     $output .= "</select>\n";
     $output_category = "<select name=\"category\" >\n";
    while($row = mysqli_fetch_array($result_category)) {
        $value = $row['category'];
        $output_category .= "<option value=\"";
        $output_category .= $value;
        $output_category .= "\" >";
        $output_category .= $value;
        $output_category .= "</option>\n";
    }
    $output_category .= "</select>\n";

    $output_content = "<select name=\"content_rating\" >\n";
    while($row = mysqli_fetch_array($result_content)) {
        $value = $row['content_rating'];
        $output_content .= "<option value=\"";
        $output_content .= $value;
        $output_content .= "\">";
        $output_content .= $value;
    }
    $output_content .= "</option>";
    $output_content .= "<option value = 'not'>선택없음</option>";
    $output_content .= "</select>\n";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>googleplaystore</title>
</head>

<body>
    <h1> 구글 플레이 스토어 검색 시스템 </h1>
    <form action="app_search.php" method="POST">
        (1) 어플 이름 검색:
        <input type="text" name="app_name" placeholder="app_name">
        <input type="submit" value="Search">
    </form>

    <form action="app_category.php" method="POST">
        (2) 어플 카테고리 검색:<br>
        <?=$output_category?><br>
        <?=$output_content?><br>
        <label><input type="radio" name="type" value="free" checked>무료</label>
        <label><input type="radio" name="type" value="paid" checked>유료</label>
        <label><input type="radio" name="type" value="all" checked>전체</label><br>
        <select name = order>
        <option value = reviews>리뷰순</option>
        <option value = rating>평점순</option>
        </select><br>
        <input type="submit" value="Search">
    </form>

    <form action="app_genres.php" method="POST">
        (3) 어플 장르 검색:<br>
        *카테고리 보다 종류가 많아서 다양한 검색이 가능합니다.<br>
        <?=$output?><br>
        <?=$output_content?><br>
        <label><input type="radio" name="type" value="free" checked>무료</label>
        <label><input type="radio" name="type" value="paid" checked>유료</label>
        <label><input type="radio" name="type" value="all" checked>전체</label><br>
        <select name = order>
        <option value = reviews>리뷰순</option>
        <option value = rating>평점순</option>
        </select><br>
        <input type="submit" value="Search">
    </form>
    
    <form action="app_select.php" method="POST">
    (4) 어플 조회:
    <br>*아무것도 입력하지 않았을 때는 10명이 기본값입니다.
    <br>
        <input type = "number" name = "count" placeholder = "count">
        <select name = order>
        <option value = reviews>리뷰순</option>
        <option value = rating>평점순</option>
        </select>
        <input type = "submit" value = "Search">
    </form>
</body>

</html>