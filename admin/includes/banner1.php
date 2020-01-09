                  <tr>
                  <th>Teksti Kryesor</th>
                  <th>Teksti Deskriptues</th>
                  <th>Me shume funksione</th>
                </tr>
                <?php 
              mysqli_next_result($connection);
              $select_banners = mysqli_query($connection,'CALL banner()');
              if(!$select_banners){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);

              while($row = mysqli_fetch_assoc($select_banners)) {
                $main_text_id = $row['main_text_id'];
                $main_text = $row['main_text'];
                $main_tagline = $row['main_tagline'];

                echo "<tr>";
                echo "<td>$main_text</td>";
                echo "<td>$main_tagline</td>";

                echo "<td><a href='admin.php?source=edit_banner&main_text_id={$main_text_id}'><button type='button' class='btn btn-primary'>Edit</button></a></td>";
                echo "</tr>";

              }                    
            ?>