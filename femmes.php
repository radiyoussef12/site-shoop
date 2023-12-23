
<?php  
session_start();  
$connect = mysqli_connect("localhost", "root", "", "yousseftp"); 

if(isset($_POST["add_to_cart"]))  
{  
  $sql="DELETE FROM data";
$connect->query($sql);

  $name=$_POST['hidden_name'];
$price=$_POST['hidden_price'];
$image=$_POST['hidden_image'];
$sql = "INSERT INTO  data (name, price, image) VALUES ('$name', $price, '$image')";
$connect->query($sql);


$sql = "INSERT INTO data (name, price, image) VALUES (?, ?,?)";

// Create a prepared statement
$stmt = $connect->prepare($sql);

// Bind parameters and execute
$stmt->bind_param("sis", $name,$price,$image);

if ($stmt->execute()) {
  $connect->close();

  header("Location: purple.php");
  exit(); // Make sure to exit to prevent further execution
} else {
  $connect->close();
  echo "<script> alert(".$stmt->error.")</script>" ;
}

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="femmes.css">
  <link rel="shortcut icon" href="imgs/Capture.PNG">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>pret-à-porter de luxe | Femmes</title>
</head>
<body>
    <!-- barre de navigation--> 
    
         <nav>
           <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label> 
           <div class="logo"> 
             <p><a href="index.html">MSSA LAURENT</a></p>
           </div>
          <ul>
           <li><a href="hommes.php">Hommes</a></li>
           <li><a href="enfants.php">Enfants</a></li>
           <li><a href="cadeaux.php">Cadeaux</a></li>
           <li><a href="découvrir.html">Découvrir</a></li>
           <li><a href="login.HTML"><i class="las la-user" style="color: #ffffff;"></i></a></li>
           <li><a href=""><i class="fa fa-heart" style="color: #fffbfb;"></i></a></li>
           <li><a href="cards.php"><i class="fa-sharp fa fa-cart-shopping" style="color: #ffffff;"></i></a></li>
           <li><a href=""><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></a></li>
          </ul> 
                    
         </nav>
         <header>
            <div class="overlay">
                <video autoplay muted loop>
                <source src="femme.mp4" type="video/mp4">
                </video>
            </div>
          </header>
            <!-- images-->
            <section class="fam" >
                <img src="model1.PNG">
                </section>
           
            <!--fin images-->

             <section class="section__container musthave__container">
              <h2 class="section__title">Catégories pour elle</h2>
              <div class="menuToggle" onclick="toggleMenu();"></div>
              <div class="musthave__nav">
                <a href="#Robes"onclick="toggleMenu();">Robes</a>
                <a href="#Sacs-à-main" onclick="toggleMenu();">Sacs-à-main</a>
                <a href="#Escaplins" onclick="toggleMenu();">Escaplins</a>
                <a href="#Ensemble"onclick="toggleMenu();">Ensemble</a>
              </div>
            
              <h3 class="Robes" id="Robes">Robes</h3>

              <div class="cards"> 
              <?php 
               
               $query = "SELECT * FROM robesf ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               {  
                    while($row = mysqli_fetch_array($result))  
                    {  
               ?>  
   <form method="post" action=""> 

                <div  class  ="card">
                   <img src=" <?php echo $row["image"]; ?>" class="img-responsive" /> 
                 <div class="card-header">
                     <h4 class="title"><?php echo $row["name"]; ?></h4>
                     <h4 class="prix"><?php echo $row["price"]; ?>DH</h4>
                 </div>
                 <div class="card-body">
                    <p>MSSA pour elle </p>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />  

                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                    <button class="buy-btn" name="add_to_cart">buy now</button>
                 </div>
                </div>
                </form>  
                

               <?php  
                    }  
               }  
               ?> 
            </div>



            <h3 class="Sacs-à-main" id="Sacs-à-main">Sacs-à-main</h3>


            <div class="cards"> 
              <?php 
               
               $query = "SELECT * FROM sacsamain ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               {  
                    while($row = mysqli_fetch_array($result))  
                    {  
               ?>  
   <form method="post" action=""> 

                <div  class  ="card">
                   <img src=" <?php echo $row["image"]; ?>" class="img-responsive" /> 
                 <div class="card-header">
                     <h4 class="title"><?php echo $row["name"]; ?></h4>
                     <h4 class="prix"><?php echo $row["price"]; ?>DH</h4>
                 </div>
                 <div class="card-body">
                    <p>MSSA pour elle </p>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />  

                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                    <button class="buy-btn" name="add_to_cart">buy now</button>
                 </div>
                </div>
                </form>  
                

               <?php  
                    }  
               }  
               ?> 
            </div>



          <h3 class="Escaplins" id="Escaplins">Escaplins</h3>
           
          <div class="cards"> 
              <?php 
               
               $query = "SELECT * FROM Escaplinsf ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               {  
                    while($row = mysqli_fetch_array($result))  
                    {  
               ?>  
   <form method="post" action=""> 

                <div  class  ="card">
                   <img src=" <?php echo $row["image"]; ?>" class="img-responsive" /> 
                 <div class="card-header">
                     <h4 class="title"><?php echo $row["name"]; ?></h4>
                     <h4 class="prix"><?php echo $row["price"]; ?>DH</h4>
                 </div>
                 <div class="card-body">
                    <p>MSSA pour elle </p>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />  

                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                    <button class="buy-btn" name="add_to_cart">buy now</button>
                 </div>
                </div>
                </form>  
                

               <?php  
                    }  
               }  
               ?> 
            </div>


          <h3 class="Ensemble" id="Ensemble">Ensemble</h3>
           

          <div class="cards"> 
              <?php 
               
               $query = "SELECT * FROM Ensemble ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               {  
                    while($row = mysqli_fetch_array($result))  
                    {  
               ?>  
   <form method="post" action=""> 

                <div  class  ="card">
                   <img src=" <?php echo $row["image"]; ?>" class="img-responsive" /> 
                 <div class="card-header">
                     <h4 class="title"><?php echo $row["name"]; ?></h4>
                     <h4 class="prix"><?php echo $row["price"]; ?>DH</h4>
                 </div>
                 <div class="card-body">
                    <p>MSSA pour elle </p>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />  

                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                    <button class="buy-btn" name="add_to_cart">buy now</button>
                 </div>
                </div>
                </form>  
                

               <?php  
                    }  
               }  
               ?> 
            </div>





            </section>
            <script type="text/javascript">
              window.addEventListener('scroll', function(){
                  const header =document.querySelector('header');
                  header.classList.toggle("sticky", window.scrollY > 0 );
              });
         
              function toggleMenu(){
                  const tmenuToggle = document.querySelector('.menuToggle');
                  const navbar = document.querySelector('.navbar');
                  navbar.classList.toggle('active');
                  menuToggle.classList.toggle('active');
              }
          </script>
          

<footer class="footer">
  <div class="footer-contaner">
    <div class="footer__els">
      <div class="footer__el">
        <h4 class="footer-el--title">Boutique</h4>
        <ul>
          <li>
            <a href="">Femmes</a>
          </li>
          <li>
            <a href="">Hommes</a>
          </li>
          <li>
            <a href="">Enfants</a>
          </li>
          <li>
            <a href="">Cadeaux</a>
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
        <span
          >Inscrivez-vous et obtenez nos nouvelles ajouts de produits</span>
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