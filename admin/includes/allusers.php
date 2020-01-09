<h1> All users </h1>
<table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Emri</th>
                  <th>Email</th>
                  <th colspan="2">Me shume funksione</th>
                </tr>
              </thead>
            <tbody>
          <?php 

              mysqli_next_result($connection);
              $select_users = mysqli_query($connection,'CALL selectUsers()');
              if(!$select_users){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);
              while($row = mysqli_fetch_assoc($select_users)) {
                $userId = $row['userId'];
                $emri = $row['emri'];
                $email = $row['email'];
                

                echo "<tr>";
                echo "<td>$userId</td>";
                echo "<td>$emri</td>";
                echo "<td>$email</td>";
               
                echo "<td><a href='users.php?edit=updateuser&userId={$userId}'><button type='button' class='btn btn-primary'>Edito User</button></a></td>";
                echo "<td><a href='users.php?delete={$userId}'><button type='button' class='btn btn-primary'>Fshij Perdoruesin</button></a></td>";
                echo "</tr>";

              }       
              if(isset($_GET['delete'])){
                $the_user_id = $_GET['delete'];
                
              mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deleteUsers('$the_user_id')");
              mysqli_next_result($connection);
                header("Location: users.php");
                } 
            ?>
            </tbody>
            </table>