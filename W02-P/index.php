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

            if(isset($_GET['id'])){
                $query = "SELECT * FROM topic WHERE id = {$_GET['id']}";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                $article = array(
                    'title' => $row['title'],
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
        
        <a href = "create.php">create</a>
        
        <h2> <?= $article['title']?> </h2>
        <?= $article['description']?>
        <ol>
           <?= $list ?> 
        </o1>
    </body>
    </html>
  
