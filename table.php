

<?php  
session_start();  
$connect = mysqli_connect("localhost", "root", "", "yousseftp"); 

// $sql = "SELECT name, price, image ,size,total, quantity FROM card ";
// $connect->query($sql);

// $result = $connect->query($sql);

// if ($result->num_rows > 0) {
//   // Fetch the data and store it in variables
//   $row = $result->fetch_assoc();
  
//   $name = $row["name"];
//   $price = $row["price"];
//   $image = $row["image"];
//   $size = $row["size"];
//   $total = $row["total"];
//   $quantity = $row["quantity"];
  

// }
if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "delete")  
     {
        $id = $_GET['id'];  
        $query = "DELETE FROM `card` WHERE id = '$id'";  
        $run = mysqli_query($connect,$query);  
        if ($run) {  
            //  header('location:cards.php'); 
            echo "<script type='text/javascript'>alert('Delete was suscaufl');</script>";
         
        }else{  
             echo "Error: ".mysqli_error($connect);  
        }
      }}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <a href="hommes.php" class="link">la page d'accueil</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th> Price </th>
                <th> size</th>
                <th> Quantity  </th>
                <th> total </th>
                
                <th> delete </th>
            </tr>
                <!-- <tr>
                    <td><img src="2.jpg"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr> -->
                <?php 
               
               $query = "SELECT * FROM card ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               { 
                    while($row = mysqli_fetch_array($result)) 

                    {  $x=$row["total"];
                        $x=$x+$row["total"];
               ?> 
                    <form method="post" action="">
                    <tr>
                  
                         
                    <td> <img src=" <?php echo $row["image"] ; ?>" alt=""><?php echo $row["name"]; ?></td>

                        <td> <?php echo $row["price"]; ?>DH </td>
                        <td> <?php echo $row["size"]; ?> </td>
                        <td> <?php echo $row["quantity"]; ?></td>
                        <td>
                            <p ><?php echo $row["total"]; ?> DH</p>
                        </td>
                        
                        <!-- <td><button  style="border: none;"> <strong>  update</strong></button> </td> -->
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" /> 

                        <td> <strong> <a href="table.php?action=delete&id=<?php echo $row["id"]; ?>" > delete</button> </a></td>
                       
                      
                    </tr>
                    </form >
                

              
                    <?php  
                    
                     }  
                }  
                ?>
            <tr class="total">
                <th>Total : <?php echo $x; ?></th>
              
            </tr>
         
        </table>
    </section>
</body>
</html>