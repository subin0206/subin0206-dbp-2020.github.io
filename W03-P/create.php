<?php
    $link = mysqli_connect('localhost','root','20172025','hw01');
    $query = "SELECT * FROM MEMO";
    $result = '';
    $result = mysqli_query($link,$query);
    $list = '';

    while($row = mysqli_fetch_array($result)){
        $list = $list."<li><a href =\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    }
    $article = array(
        'title' => 'MEMO',
        'description' => 'List'
    );
    if(isset($_GET['id'])){
        $query = "SELECT*FROM MEMO WHERE id = {$_GET['id']}";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $article = array(
            'tilte' => $row['title'],
            'description' => $row['description']
        );
    }
?>

<!DOCYTPE html>
<html>
    <head>
        <meta chareset = "utf-8">
        <title> DATABSE_HW01 </title>
    </head>
    <body>
        <h1><a href = "index.php"> MEMO </a></h1>
        <ol>
           <?= $list ?>
        </o1>
      <form action = "process_create.php" method = "post">
          <p><input type = "text" name = "title" placeholder = "title"></p>
          <p><textarea name = "description" placeholder = "descriotion"></textarea></p>
          <p><input type = "submit"></p>
        </form>
    </body>
 
    </html>