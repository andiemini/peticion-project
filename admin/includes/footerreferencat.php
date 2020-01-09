<h1> Referencat</h1>
<table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Emri i References</th>
                  <th>Linku</th>
                  <th colspan="2">Ndrysho</th>
                </tr>
              </thead>
            <tbody>
          <?php 
             
              mysqli_next_result($connection);
              $select_menu = mysqli_query($connection,'CALL footerReferencat()');
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
                echo "<td><a href='admin.php?editreferencat=editfooter&ID_Menu={$ID_Menu}'><button type='button' class='btn btn-primary'>Ndrysho Referencat</button></a></td>";
                echo "<td><a href='admin.php?delete={$ID_Menu}'><button type='button' class='btn btn-primary'>Fshij Referencat</button></a></td>";
                echo "</tr>";
              }       
              echo "<td><a href='admin.php?editreferencat=footeraddreferenca&ID_Menu={$ID_Menu}'><button type='button' class='btn btn-primary'>Shto te re</button></a>";

              if(isset($_GET['delete'])){
                $the_menu_id = $_GET['delete'];
              mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deleteFooterReferencat('$the_menu_id')");
              mysqli_next_result($connection);
                header("Location: admin.php");
                } 
                
            ?>
            </tbody>
            </table>
<p> Shto Reference te re </p>



<!-- SHTO MENU -->


<!-- END SHTO MENU -->