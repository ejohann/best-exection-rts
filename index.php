<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <title>Best Execution RTS</title>
   <script src="js/sorttable.js"></script>
  </head>
  <body>    

<?php 

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
                            
                foreach($columns as $column)
                 {
                   echo "<th>" .$column. "</th>";       
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