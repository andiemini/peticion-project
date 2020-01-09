<h1> Peticionet e mia </h1>
<table class="table">
              <thead>
                <tr>
                  <th>Titulli</th>
                  <th>Kategoria</th>
                  <th>Data</th>
                  <th>Attachment</th>
                  <th>Përmbajtja</th>
                  <th>Përgjigjje</th>
                  <th colspan="2">Ndrysho te dhenat</th>
                </tr>
              </thead>
            <tbody>
          <?php 
              mysqli_next_result($connection);
      $select_petitions = mysqli_query($connection,"CALL selectAutori('".$_SESSION['user']."')");
      if(!$select_petitions){
                echo mysqli_error($connection);
              }
      mysqli_next_result($connection);

              while($row = mysqli_fetch_assoc($select_petitions)) {
                $peticionId = $row['peticionId'];
                $peticion_title = $row['Titulli'];
                $peticion_cat = $row['Kategori'];
                $peticion_time = $row['Data'];
                $peticion_mesazhi = $row['Mesazhi'];
                $peticion_answer = $row['Pergjigjja'];
                $peticion_attach = $row['Attachment'];

                echo "<tr>";
                echo "<td>$peticion_title</td>";
                echo "<td>$peticion_cat</td>";
                echo "<td>$peticion_time</td>";
                echo "<td>$peticion_attach</td>";
                echo "<td>$peticion_mesazhi</td>";
                echo "<td>$peticion_answer</td>";


                echo "<td><a href='user.php?editmypetition=editmypetition&peticionId={$peticionId}'><button type='button' class='btn btn-primary'>Ndrysho te dhenat</button></a></td>";
                echo "<td><a href='user.php?delete={$peticionId}'><button type='button' class='btn btn-primary'>Fshij Peticionin</button></a></td>";
                echo "</tr>";

              }       
              if(isset($_GET['delete'])){
                $the_petition_id = $_GET['delete'];
              mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deletePetition('$the_petition_id')");
              mysqli_next_result($connection);
                //header("Location: user.php");
                } 
              
            ?>
            </tbody>
            </table>