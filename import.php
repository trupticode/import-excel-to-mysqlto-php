<?php
use SimpleExcel\SimpleExcel;
if(isset($_POST['import']))
{

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){

    require_once('SimpleExcel/SimpleExcel.php'); // load the main class file (if you're not using autoloader)

$excel = new SimpleExcel('csv');                    // instantiate new object (will automatically construct the parser & writer type as XML)

$excel->parser->loadFile($_FILES['excel_file']['name']);            // load an XML file from server to be parsed

$foo = $excel->parser->getField();   
        $count=1;
        $db=mysqli_connect('localhost','root','','import_excel_php');

        while(count($foo)>$count)  
        {
            $roll=$foo[$count][0];
            $name=$foo[$count][1];
            $email=$foo[$count][2];
            $mobile=$foo[$count][3];

            $query="INSERT INTO students (roll_no,name,mobile,email)VALUES('$roll','$name','$mobile','$email')";
            mysqli_query($db,$query);
            $count++;

        }     
        echo "<script>window.location.href='index.php';</script" ;


 echo '<pre>';
 print_r($foo);                                    
 echo '</pre>';

}




}

?>