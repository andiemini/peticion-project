<h1> Main Menu Admin </h1>
<p> Ndrysho permbajtjet </p>
<table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Emri i Menu</th>
                  <th>Link i menu</th>
                  <th colspan="2">Ndrysho</th>
                </tr>
              </thead>
            <tbody>
          <?php 
              mysqli_next_result($connection);
              $select_menu = mysqli_query($connection,'CALL selectMenuAdm()');
              if(!$select_menu){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);

              while($row = mysqli_fetch_assoc($select_menu)) {
                $ID_Menu = $row['ID_Menu'];
                $Emri_Menu = $row['Emri_Menu'];
                $Link = $row['Link'];

                echo "<tr>";
                echo "<td>$ID_Menu</td>";
                echo "<td>$Emri_Menu</td>";
                echo "<td>$Link</td>";
                echo "<td><a href='menu.php?editmenuadm=editmainmenu&ID_Menu={$ID_Menu}'><button type='button' class='btn btn-primary'>Ndrysho Menu</button></a></td>";
                echo "<td><a href='menu.php?delete={$ID_Menu}'><button type='button' class='btn btn-primary'>Fshij Menu</button></a></td>";
                echo "</tr>";
              }       
              echo "<td><a href='menu.php?editmenuadm=shtomenu&ID_Menu={$ID_Menu}'><button type='button' class='btn btn-primary'>Shto menu te re</button></a>";

              if(isset($_GET['delete'])){
                $the_menu_id = $_GET['delete'];
              mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deleteMenuAdm('$the_menu_id')");
              mysqli_next_result($connection);
                header("Location: menu.php");
                } 
                
            ?>
            </tbody>
            </table>
<p> Shto menu te re </p>



<!-- SHTO MENU -->


<!-- END SHTO MENU -->