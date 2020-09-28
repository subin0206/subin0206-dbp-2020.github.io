<?php
                $link = mysqli_connect('localhost', 'root','20172025', 'hw01');
                $query = "SELECT* FROM MEMO";
                $result = mysqli_query($link, $query);
                $list = '';
                while($row = mysqli_fetch_array($result)){
                    $list = $list."<li><a href =\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
                }

            $article = array(
                'title' => 'TO DO',
                'description' => 'TO DO LIST is...'
            );
            
            $update_link = '';
            $delete_link = '';
            $writer = '';
            if(isset($_GET['id'])){
                $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
                $query = "SELECT * FROM MEMO LEFT JOIN WRITER ON memo.writer_id = writer.id
                WHERE memo.id = {$filtered_id}";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                $article['title'] = htmlspecialchars($row['title']);
                $article['description'] = htmlspecialchars($row['description']);
                $article['name'] = htmlspecialchars($row['name']);
                $writer = "<p>글쓴이: {$article['name']}</p>";
                $update_link = '<a href = "update.php?id='.$_GET['id'].'">update</a>';
                $delete_link = '
                <form action = "process_delete.php" method="POST">
                    <input type = "hidden" name = "id" value = "'.$_GET['id'].'">
                    <input type = "submit" value = "delete">
                </form>
                ';

            }
           
            ?>
<!DOCYTPE html>
<html>
    <head>
        <meta chareset = "utf-8">
        <title> DATABSE_HW02 </title>
    </head>
    <body>
        <h1><a href = "index.php"> MEMO </a></h1>
        <a href = "writer.php">writer</a>
        <a href = "create.php">create</a>
        <?=$update_link?>
        <?=$delete_link?>
        <h2> <?= $article['title']?> </h2>
        <?= $article['description']?>
        <?=$writer?>
        <ol>
           <?= $list ?> 
        </o1>
    </body>
    </html>
  
