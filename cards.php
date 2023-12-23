<!-- 
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
 -->


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert | Export html Table to CSV & EXCEL File</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Shoop card</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
               <a href="purple.php"><label for="export-file" class="export__file-btn" title="Export File" ></label></a> 
                <!-- <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div> -->
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>  <span class="icon-arrow">&UpArrow;</span></th>
                       
                        <th> Price <span class="icon-arrow">&UpArrow;</span></th>
                        <th> size<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Quantity  <span class="icon-arrow">&UpArrow;</span></th>
                        <th> total <span class="icon-arrow">&UpArrow;</span></th>
                        
                        <th> delete <span class="icon-arrow">&UpArrow;</span></th>

                    </tr>
                </thead>
                <tbody>  <?php 
               
               $query = "SELECT * FROM card ORDER BY id ASC";  
               $result = mysqli_query($connect, $query);  
               if(mysqli_num_rows($result) > 0)  
               {  
                    while($row = mysqli_fetch_array($result))  
                    {  
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

                        <td> <strong> <a href="cards.php?action=delete&id=<?php echo $row["id"]; ?>" > delete</button> </a></td>
                       
                      
                    </tr>
                    </form >
                

                <?php  
                     }  
                }  
                ?>
                </tbody>
                
            </table>
        </section>
    </main>
    <script src="script.js"></script>

</body>

</html>
