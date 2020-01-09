<h1> All Posts </h1>
<table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Titulli</th>
                  <th>Kategoria</th>
                  <th>Data</th>
                  <th>Përgjigjja</th>
                  <th colspan="2">More Actions</th>
                </tr>
              </thead>
            <tbody>
          <?php 
              
              mysqli_next_result($connection);
               $select_petitions = mysqli_query($connection,'CALL selectPetitions()');
              if(!$select_petitions){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);
             

              while($row = mysqli_fetch_assoc($select_petitions)) {
                $peticionId = $row['peticionId'];
                $peticion_title = $row['Titulli'];
                $peticion_cat = $row['Kategori'];
                $peticion_time = $row['Data'];
                $peticion_answ = $row['Pergjigjja'];

                echo "<tr>";
                echo "<td>$peticionId</td>";
                echo "<td>$peticion_title</td>";
                echo "<td>$peticion_cat</td>";
                echo "<td>$peticion_time</td>";
                echo "<td>$peticion_answ</td>";
                echo "<td><a href='petitions.php?pergjigjje=jeppergjigjje&peticionId={$peticionId}'><button type='button' class='btn btn-primary'>Jep Pergjigjje</button></a></td>";
                echo "<td><a href='petitions.php?delete={$peticionId}'><button type='button' class='btn btn-primary'>Fshij Peticionin</button></a></td>";
                echo "</tr>";

              }       
              if(isset($_GET['delete'])){
                $the_petition_id = $_GET['delete'];
              mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deletePetition('$the_petition_id')");
              mysqli_next_result($connection);
                header("Location: petitions.php");
                } 
            ?>
            </tbody>
            </table>