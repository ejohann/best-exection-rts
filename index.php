<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <title>Best Execution RTS</title>
   <link rel="stylesheet" type="text/css" href="css/styles.css">
   <script src="js/sorttable.js"></script>
  </head>
  <body>    

    <form enctype="multipart/form-data" action="" method="POST">

    <!--    <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->

        Process this file: <input name="userfile" type="file" required />
       <input type="submit" name="submit" value="Process File" />
    </form>


<?php 
      
    if(isset($_POST['submit']))
    {      
      $user_file = $_FILES['userfile']['name'];
      $user_file_temp = $_FILES['userfile']['tmp_name'];

       move_uploaded_file($user_file_temp, "files/$user_file");
            
    }

    $handle = fopen("GSI_2019-03-09.txt", "r");
    
  if($handle) 
     {
      
      //echo count($handle);
           
      $count = 0;
      echo "<table class='sortable'>";
        while (($line = fgets($handle)) !== false)
         {
            
            if($count == 0)
              { 
                echo "<thead><tr>";
                $columns = explode("|",$line);
                  $i = 1;          
                foreach($columns as $column)
                 {
                   echo "<th> " .$i.". " .$column. "</th>";
                    $i++;
                 }
                echo "</tr></thead>";
              }
            else
             {
                if($count == 1)
                 {
                    echo "<tbody>"; 
                    echo "<tr>";
                    $rows = explode("|",$line);            
                    foreach($rows as $row)
                      {
                        echo "<td>" .$row. "</th>";  
                      }
                     echo "</tr>";    
                  }
                else
                 {                
                    echo "<tr>";
                    $rows = explode("|",$line);            
                    foreach($rows as $row)
                     {
                        echo "<td>" .$row. "</th>";  
                     }
                    echo "</tr>";
                 }                 
             }
            
            $count++;
         }

        fclose($handle);
      echo "</tbody></table>";
    } 
  else 
   {
      // error opening the file.
   } 



?>


  </body>
</html>