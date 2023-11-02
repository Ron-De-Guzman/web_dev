<?php
include 'Navigation/nav.php';
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Navigation/css/searchbar.css">
    <link rel="stylesheet" href="Navigation/css/nav.css">
    <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Navigation/css/nav.css">
    <link rel="stylesheet" href="productTable.css">
</head>


    
<body>

            </div>
            <?php 
     include 'Navigation/searchbar.php';
     ?> 
    
    

    <div class="container my-5">
        <h2>List of Products</h2>

        <a class="btn btn-success" href="inventory.php" role="buton">New Product</a>

        
            <a class="btn btn-primary" href="print.php">PRINT</a>
        
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Product_Category</th>
                    <th>Product_Measurement</th>
                    <th>Product_Price</th>
                    <th>Product_Quantity</th>
                    <th>Actions</th>
                    
                   
                </tr>
            </thead>
            <div>
           
            <tbody>
                <?php
                     
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $db = "web_inventory"; 

                    //Create Connection
                    $connection = new mysqli($server, $username, $password, $db);

                    //Check Connection
                    if ($connection->connect_error){
                        die("Connection Failed: ". $connection->connect_error);
                    }

                    //Read all row from the database table
                    $sql = "SELECT * FROM  tbl_product";
                    $result =$connection->query($sql);

                    if (!$result){
                        die("Invalid Query:" . $connection->error);
                    }

                    while($row = $result->fetch_assoc()){
                        $quantity = $row['product_Quantity'];
                        $dangerIcon = ($quantity <= 5) ? "<i class='fas fa-exclamation-triangle text-danger'></i>" : "";
                    
                        // Check category and update danger icon accordingly
                        if ($row['product_Category'] == 'Lightning' && $quantity <= 10) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                        elseif ($row['product_Category'] == 'Power Tools' && $quantity <= 10) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                        elseif ($row['product_Category'] == 'Plumbing' && $quantity <= 5) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                        elseif ($row['product_Category'] == 'Handtools' && $quantity <= 10) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                        elseif ($row['product_Category'] == 'Lawn and Garden' && $quantity <= 10) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                        elseif ($row['product_Category'] == 'Houseware' && $quantity <= 5) {
                            $dangerIcon = "<i class='fas fa-exclamation-triangle text-danger'></i>";
                        }
                    
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[product_Name]</td>
                            <td>$row[product_ID]</td>
                            <td>$row[product_Category]</td>
                            <td>$row[product_Measurement]</td>
                            <td>$row[product_Price]</td>
                            <td>$quantity $dangerIcon</td>
                            <td>
                                <a class='circle-in-center btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='archived_products.php?action=archive&id=$row[id]'>Archive</a>
                            </td>  
                        </tr>
                        ";
                    }
                                ?>
                
            </tbody>
        </table>

        
      
</body>
</html>