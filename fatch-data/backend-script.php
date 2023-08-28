<?php

include("database.php");
$db=$conn;
// fetch query
function fetch_data(){
 global $db;
  $query="SELECT * from users ORDER BY id DESC";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetchData= fetch_data();
show_data($fetchData);

function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>S.N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>';

 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 

  echo "<tr>
          <td>".$sn."</td>
          <td>".$data['first_name']."</td>
          <td>".$data['last_name']."</td>
          <td>".$data['email']."</td>
          <td>".$data['phone']."</td>
          <td><a href='crud-form.php?edit=".$data['id']."'>Edit</a></td>
          <td><a href='crud-form.php?delete=".$data['id']."'>Delete</a></td>
   </tr>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='2'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}

?>