<!DOCTYPE html>  
 <html>  
      <head>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h1 style="text-align:center;">User Data</h1><br />                 
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                                 
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr><td>'.$row["Name"].'</td></tr>';  
                               echo '<tr><td>'.$row["Age"].'</td></tr>';
                               echo '<tr><td>'.$row["Designation"].'</td></tr>';  
                          }                          
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  