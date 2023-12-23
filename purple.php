





<?php



session_start();  
$connect = mysqli_connect("localhost", "root", "", "yousseftp"); 


$sql = "SELECT name, price, image FROM data ";
$connect->query($sql);

$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // Fetch the data and store it in variables
  $row = $result->fetch_assoc();
  
  $name = $row["name"];
  $price = $row["price"];
  $image = $row["image"];

}








if(isset($_POST["ajouter"]))   
{ 

  $sql = "INSERT INTO card (name, price, image, size, total, quantity) VALUES (?, ?, ?, ?, ?, ?)";

  // Create a prepared statement
  $stmt = $connect->prepare($sql);
  
  // Bind parameters and execute
  $size=$_POST['size'];
  $quantity=$_POST['quantity'];
  $total= $price * $quantity;
  $stmt->bind_param("sissii", $name, $price, $image, $size,$total,  $quantity);
  
  if ($stmt->execute()) {
    $connect->close();
      
      header("Location:cards.php");
      // echo "<script> alert('add to cart')</script>" ;
      exit(); // Make sure to exit to prevent further execution
  } else {
    $connect->close();
 echo "<script> alert(".$stmt->error.")</script>" ;
      // echo "Error: " . $stmt->error;
  }
  
  
  
}

?>







 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="purple.css">
  <link rel="shortcut icon" href="imgs/Capture.PNG">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>produit1</title>
</head>
<body>
    
    <div class="banner" >
        <div class="navbar">
            <div class="logo"> 
                <p> MSSA LAURENT</p>
              </div>
              <div class="menuToggle" onclick="toggleMenu();"></div>
              <ul>
              <li><a href="hommes.php" onclick="toggleMenu();">Hommes</a></li>
              <li><a href="femmes.php" onclick="toggleMenu();">Femmes</a></li>
              <li><a href="enfants.php" onclick="toggleMenu();">Enfants</a></li>
              <li><a href="cadeaux.php"onclick="toggleMenu();">Cadeaux</a></li>
              <li><a href="découvrir.html" onclick="toggleMenu();">Découvrir</a></li>
              <li><a href=""><i class="fa fa-heart" style="color: #ffffff;" onclick="toggleMenu();"></i></a></li>
              <li><a href="cards.php"><i class="fa-sharp fa fa-cart-shopping" style="color: #ffffff;" onclick="toggleMenu();"></i></a></li>
              <li><a href=""><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;" onclick="toggleMenu();"></i></a></li>
             </ul>            
        </div>
            
            <div class="flex-box">
                
                <div class="left" >
                
                   <div class="big-img">
                    <img style=" height: 340px;" src=" <?php echo  $image ; ?>">
                </div>
             
              </div>
            
             <!-- <div class="images">
                <div class="small-img">
                    <img src="pr0003.webp" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="com.webp" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="pr0003.webp" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="pr0003.webp" onclick="showImg(this.src)">
                </div>
            </div> 
              -->
               <div class="right" style="padding:rghit 301px;" >
               <div class="pname"><?php echo $name; ?></div>
                <div class="price"><?php echo $price; ?>DH</div>

        
                <form  method="post"  action="">
                
                <div class="Size">
                 
                <p>Size :</p>
                <select class="size" name="size">
                <option>EU 44</option>
                <option>EU 46</option>
                <option>EU 48</option>
                <option>EU 50</option> 
               </select>
                </div>
    

               <div class="quantity">
                <p>Quantity :</p>
                <input type="number" min="1" max="5" value="1"  name="quantity">
               </div>
        
               <div class="detail">
                <h4 >Détails :</h4>
               <span><?php echo $name; ?>,  </span>
               <span> une bon qaliti et  </span>
               </div>
            
                <div class="btn-box">
                <button class="cart-btn" name="ajouter">Ajouter au panier</button>
                </div>
                </form>  
            </div>
    
    
               <script>
               let bigImg = document.querySelector('.big-img img');
               function showImg(pic){
                bigImg.src = pic;
                 }
                </script>
        </div>  
</div>

<footer class="footer">
    <div class="footer-contaner">
      <div class="footer__els">
        <div class="footer__el">
          <h4 class="footer-el--title">Boutique</h4>
          <ul>
            <li>
              <a href="femmes.html">Femmes</a>
            </li>
            <li>
              <a href="hommes.html">Hommes</a>
            </li>
            <li>
              <a href="enfants.html">Enfants</a>
            </li>
            <li>
              <a href="cadeaux.html">Cadeaux</a>
            </li>
          </ul>
        </div>
        <div class="footer__el">
          <h4 class="footer-el--title">Informations</h4>
          <ul>
            <li>
              <a href="">Aide</a>
            </li>
            <li>
              <a href="">Feeback</a>
            </li>
            <li>
             
            <li>
              <a href="">Blog</a>
            </li>
          </ul>
        </div>
  
        <div class="footer__el">
          <h4 class="footer-el--title">Histoire</h4>
          <ul>
            <li>
              <a href="">Qui sommes-nous</a>
            </li>
            <li>
             
            <li>
              <a href="">Contact</a>
            </li>
  
            <li>
             
          </ul>
        </div>
        <div class="footer__el">
          <span>Inscrivez-vous et obtenez nos nouvelles ajouts de produits</span>
          <div class="footer__el-input">
            <input type="text" placeholder="Entrer votre E-mail ..." />
            <input type="submit" />
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar-social-media">
      <div class="sidebar-social-media__content">
        <h3>Suivez-nous sur :</h3>
        <div class="sidebar-social-media__content_icon">
          <span><i class="lab la-twitter"></i></span>
          <span><i class="lab la-instagram"></i></span>
          <span><i class="lab la-facebook-f"></i></span>
          <span><i class="lab la-linkedin-in"></i></span>
        </div>
      </div>
    </div>
  </footer>


</body>
</html>



         
