                  <tr>
                 <th>Teksti Kryesor 2</th>
                  <th>Teksti Deskriptues 2</th>
                  <th>Me shume funksione</th>
                </tr>
                <?php 
              mysqli_next_result($connection);
              $select_banners = mysqli_query($connection,'CALL banner()');
             mysqli_next_result($connection);
            

              while($row = mysqli_fetch_assoc($select_banners)) {
                $main_text_id = $row['main_text_id'];
                $main_text = $row['main_text2'];
                $main_tagline = $row['main_tagline2'];

                echo "<tr>";
                echo "<td>$main_text</td>";
                echo "<td>$main_tagline</td>";

                echo "<td><a href='admin.php?source2=edit_banner&main_text_id={$main_text_id}'><button type='button' class='btn btn-primary'>Edit</button></a></td>";
                echo "</tr>";

              }                    
            ?>