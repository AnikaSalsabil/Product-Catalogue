<?php
    $con=mysqli_connect("localhost","root","","product_catalogue") or die(mysqli_error());
?>
<!doctype html>
<html lang="en">
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title></title>

<body>

<div class="container">
    
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="">

        <h4>Add Product</h4>


        <form id="image_form" method="post" enctype="multipart/form-data" action="">
            <label>Enter Brand Name</label>
            <!---<input type="text" name="brand" id="brand"> <br>-->

            <select class="input" name="brand" id="brand" value="<?php echo $brand;?>" required>
                <option value="0">Select Brand</option>
                <option>Apple</option>
                <option>Asus</option>
                <option>HTC</option>
                <option>Huwaei</option>
                <option>Lava</option>
                <option>Lenovo</option>
                <option>LG</option>
                <option>Micromax</option>
                <option>Nokia</option>
                <option>Oneplus</option>
                <option>Oppo</option>
                <option>Samsung</option>
                <option>Symphony</option>
                <option>Vivo</option>
                <option>Xiaomi</option>
            </select>

            <br><br>

            <label>Select Image</label>
            <input type="file" name="image" id="image" required><br>
            
            <label>Enter Size</label>
            <input type="text" name="size" id="size" required><br>
            
            <label>Enter Platform</label>
            <input type="text" name="platform" id="platform" required><br>
            
            <label>Enter memory</label>
            <input type="text" name="memory" id="memory" required><br>
            
            <label>Enter camera</label>
            <input type="text" name="camera" id="camera" required><br>
            
            <label>Enter battery</label>
            <input type="text" name="battery" id="battery" required><br>
            
            <label>Enter features</label>
            <input type="text" name="features" id="features" required><br>
            
            <label>Enter colors</label>
            <input type="text" name="colors" id="colors" required><br>

            <label>Enter Price</label>
            <input type="text" name="price" id="price" required> <br>

            <label>Enter rating</label>
            <input type="text" name="rate" id="rate" required> <br>

            <button type="submit" class="button" name="insert" id="insert">Insert</button>

        </form>


    </div>



    <?php
    
     if(isset($_POST['insert'])){
          $brand=mysqli_real_escape_string($con, $_POST['brand']);
          $size=mysqli_real_escape_string($con, $_POST['size']);
         $platform=mysqli_real_escape_string($con, $_POST['platform']);
         $memory=mysqli_real_escape_string($con, $_POST['memory']);
         $camera=mysqli_real_escape_string($con, $_POST['camera']);
         $battery=mysqli_real_escape_string($con, $_POST['battery']);
         $features=mysqli_real_escape_string($con, $_POST['features']);
         $colors=mysqli_real_escape_string($con, $_POST['colors']);
         
         
          $price=mysqli_real_escape_string($con, $_POST['price']);
          $rate=mysqli_real_escape_string($con, $_POST['rate']);
         
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
          $name=addslashes($_FILES['image']['name']);
          $query = "INSERT INTO product(brand,name,image,size,platform,memory,camera,battery,features,colors,price,rate) VALUES ('$brand','$name','$file','$size','$platform','$memory','$camera','$battery','$features','$colors','$price','$rate')";
          
         if(mysqli_query($con, $query))
           echo 'Inserted into Database';
          
         else
            echo "error";
         
         echo "<script>window.open('upload_image.php','_self')</script>"; 
 }
    
    ?>

    <table class="table table-bordered">
        <tr>
            
            <th>Image</th>
                        
        </tr>
        
        
        <?php  
                $query = "SELECT * FROM product ORDER BY id DESC";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                                
                                <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="90" class="img-thumnail" />  
                               </td>  
                                
                          
                               
                          </tr>  
                     ';  
                }  
                ?>
    </table>


    <script>
        $(document).ready(function() {
            $('#insert').click(function() {
                var image_name = $('#image').val();
                if (image_name == '') {
                    alert("Please Select Image");
                    return false;
                } else {
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('Invalid Image File');
                        $('#image').val('');
                        return false;
                    }
                }
            });
        });

    </script>

        </div>
        
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <h4>Add Brand logo</h4>
            <form id="image_form" method="post" enctype="multipart/form-data" action="">
            <label>Enter Brand Name</label>
            <!---<input type="text" name="brand" id="brand"> <br>-->

            <select class="input" name="brand" id="brand" value="<?php echo $brand;?>" required>
                <option value="0">Select Brand</option>
                <option>Apple</option>
                <option>Asus</option>
                <option>HTC</option>
                <option>Huwaei</option>
                <option>Lava</option>
                <option>Lenovo</option>
                <option>LG</option>
                <option>Micromax</option>
                <option>Nokia</option>
                <option>Oneplus</option>
                <option>Oppo</option>
                <option>Samsung</option>
                <option>Symphony</option>
                <option>Vivo</option>
                <option>Xiaomi</option>
            </select>

            <br><br>

            <label>Select Image</label>
            <input type="file" name="image" id="image" required><br><br>
            

            <button type="submit" class="button" name="upload" id="upload">Upload</button>

        </form>
               <?php
    
     if(isset($_POST['upload'])){
          $brand=mysqli_real_escape_string($con, $_POST['brand']);
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
          $query = "INSERT INTO logo(brand,image) VALUES ('$brand','$file')";
          
         if(mysqli_query($con, $query))
           echo 'Inserted into Database';
          
         else
            echo "error";
         
         echo "<script>window.open('upload_image.php','_self')</script>"; 
 }
    
    ?>
            <table class="table table-bordered">
        <tr>
            
            <th>Logos</th>
                        
        </tr>
        
        
        <?php  
                $query = "SELECT * FROM logo ORDER BY id DESC";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                                
                                <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" class="img-thumnail" />  
                               </td>  
                                
                          
                               
                          </tr>  
                     ';  
                }  
                ?>
    </table>
            
            
        </div>        
               
    </div>
    
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>
