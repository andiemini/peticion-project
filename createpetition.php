<?php include("includes/userheader.php"); ?>
    <!-- PJESA E POSTIMIT -->
      <section class="site-section" id="next-section">
          <div class="container">

          <?php 
            if(isset($_POST['create_petition'])) {

                $Titulli = $_POST['Titulli'];
                $Kategori = $_POST['Kategori'];
                $Mesazhi = $_POST['Mesazhi'];
                $Attachment = $_POST['Attachment'];
                $Data = date("Y-m-d");
                $Data = date("Y-m-d",strtotime($Data));
                $Autori = $_SESSION['user'];


                mysqli_next_result($connection);
                $result = mysqli_query($connection,"CALL createPetitions('$Titulli','$Kategori','$Mesazhi','$Attachment','$Autori',CAST('". $Data ."' AS DATE))");
                mysqli_next_result($connection);

                if(!$result){
                 echo mysqli_error($connection);
                  }     

                  echo "Peticioni u krijua me sukses " . " " . "<a href='user.php'> Kliko ketu per te shikuar peticionet tuaja.</a> ";
                  }

         

          ?>
        <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="Titulli">Petition Title</label>
            <input type="text" class="form-control" name="Titulli" required>
        </div>

        <div class="form-group">
            <label for="Kategori">Petition Category</label>
            <!-- <input type="text" class="form-control" name="Kategori"> -->
            <select name='Kategori' class='form-control'>
         <?php 
           $result= mysqli_query($connection,"CALL selectKategori()");
           while($row = mysqli_fetch_assoc($result))
           { extract($row);
              echo "<option value='$kategoriId'>$kategoriTitle</option>";
           }
           ?>
         </select>
        </div>
        
        <div class="form-group">
            <label for="Mesazhi">Petition Message</label>
            <textarea type="text" class="form-control" name="Mesazhi" cols="40" rows="15" required></textarea>
        </div>

      
        <div class="form-group">
            <label for="Attachment">Petition Attachment Link</label>
            <input type="text" class="form-control" name="Attachment" required>
        </div>

        <div class="form-group">
            <input class ="btn btn-primary" type="submit" name="create_petition" value="Publish Petition">
        </div>

        </form>


        </div>
      </section>
    <!--END  PJESA E POSTIMIT -->

<?php include("includes/footer.php"); ?>
