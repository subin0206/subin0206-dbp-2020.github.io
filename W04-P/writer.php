<?php
    $link = mysqli_connect('localhost', 'root', '20172025', 'hw01');    
    $query = "SELECT * FROM writer";
    $writer_info = '';
    $changed = '';
    $result = mysqli_query($link, $query);
   
    while ($row = mysqli_fetch_array($result)) {
        $filtered = array(
            'id' => htmlspecialchars($row['id']),
            'name' =>htmlspecialchars($row['name']),
            'profile' => htmlspecialchars($row['profile'])
        );
        $writer_info .= '<tr>';
        $writer_info .= '<td>'.$filtered['id'].'</td>';
        $writer_info .= '<td>'.$filtered['name'].'</td>';
        $writer_info .= '<td>'.$filtered['profile'].'</td>';
        $writer_info .='<td><a href = "writer.php?id='.$filtered['id'].'">update</a></td>';
        $writer_info .= 
        '<td>
            <form action = "process_delete_writer.php" method = "post">
                <input type = "hidden" name = "id" value = "'.$filtered['id'].'">
                <input type = "submit" value = "delete">
            </form>
        </td>';
        $writer_info .= '</tr>';
    };
    $changed = array(
        'name' => '',
        'profile' => ''
    );
    $form_action = 'process_create_writer.php';
    $form_id = '';
    $label_submit = 'Create Writer';
    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
        settype($filtered_id, 'integer');
        $query = "SELECT * FROM writer WHERE id = {$filtered_id}";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $changed['name'] = htmlspecialchars($row['name']);
        $changed['profile'] = htmlspecialchars($row['profile']);
        $form_action = 'process_update_writer.php';
        $label_submit = 'Update Writer';
        $form_id = '<input type = "hidden" name = "id" value = "'.$_GET['id'].'">';

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DATABASE</title>
    </head>
    <body>
        <h1><a href="index.php">DATABASE</a></h1>
        <p><a href="index.php">MEMO</a></p>

        <table border="1">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>profile</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            <?=$writer_info?>
        </table> 
        <br>      
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?> 
            <label for="fname">name:</label><br>
            <input type="text" id="name" name="name" placeholder = "name" value= "<?=$changed['name']?>"><br>
            <label for="lname">profile:</label><br>
            <input type="text" id="profile" name="profile" placeholder = "profile" value="<?=$changed['profile']?>"><br><br>
            <input type="submit" value="<?=$label_submit?>">
        </form> 

      

    </body>
</html>
