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
            
            if(isset($_GET['id'])){
                $query = "SELECT * FROM MEMO WHERE id = {$_GET['id']}";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                $article = array(
                    'title' => $row['title'],
                    'description' => $row['description']
                );
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
        
        <a href = "create.php">create</a>
        <?=$update_link?>
        <?=$delete_link?>
        <h2> <?= $article['title']?> </h2>
        <?= $article['description']?>
        <ol>
           <?= $list ?> 
        </o1>
    </body>
    </html>
  
