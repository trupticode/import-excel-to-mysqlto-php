<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="import.php" enctype="multipart/form-data" >
        <input type="file" name="excel_file" accept=".csv">
        <input type="submit" name="import" value="Import">
    </form>
    <table>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>

        </tr>
        <?php
                $db=mysqli_connect('localhost','root','','import_excel_php');
                $query="select * from students";
                $row=mysqli_query($db,$query);
                while($data = mysqli_fetch_array($row)) {
               ?>
          

                    <tr>
                        <td><?=$data['roll_no']?></td>
                        <td><?=$data['name']?></td>
                        <td><?=$data['mobile']?></td>
                        <td><?=$data['email']?></td>
                    </tr>
              
                <?php
                  }
                  ?>

                </table>
                


</body>
</html>