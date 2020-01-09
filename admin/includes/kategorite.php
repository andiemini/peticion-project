
<table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Kategoria</th>
                  <th colspan="2">More Actions</th>
                </tr>
              </thead>
            <tbody>
          <?php 
           

              mysqli_next_result($connection);
              $select_petitions = mysqli_query($connection,'CALL selectKategori()');
              if(!$select_petitions){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);
              

              while($row = mysqli_fetch_assoc($select_petitions)) {
                $kategoriId = $row['kategoriId'];
                $kategori_title = $row['kategoriTitle'];
                

                echo "<tr>";
                echo "<td>$kategoriId</td>";
                echo "<td>$kategori_title</td>";
                echo "<td><a href='petitions.php?kategorisource=updatekategori&kategoriId={$kategoriId}'><button type='button' class='btn btn-primary'>Update</button></a></td>";
                echo "<td><a href='petitions.php?delete={$kategoriId}'><button type='button' class='btn btn-primary'>Fshij kategorine</button></a></td>";
                echo "</tr>";
              }              
                if(isset($_GET['delete'])){
                $the_kategori_id = $_GET['delete'];


            mysqli_next_result($connection);
              $delete_query = mysqli_query($connection,"CALL deleteKategori('$the_kategori_id')");
              mysqli_next_result($connection);
            
                header("Location: petitions.php");
                }

            ?>
            
            <tr>
            <td>
            <a href='petitions.php?kategorisource=shtokategori&kategoriId={$kategoriId}'><button type='button' class='btn btn-primary'>Shto kategori te re</button></a>
            </td>
            </tr>
            </tbody>
            </table>