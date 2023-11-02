<?php
require 'config.php';
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Navigation/css/searchbar.css">
    <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="print.css">
    
    <style>
    /* Hide the buttons when printing */
    @media print {
        .btn-print-hide {
            display: none !important;
        }
    }
</style>

</head>


    
<body>
 

    <div class="container my-5">
        <h2>List of Products</h2>

        <a class="btn btn-success btn-print-hide" href="inventory.php" role="buton" >New Product</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Product_Category</th>
                    <th>Product_Measurement</th>
                    <th>Product_Price</th>
                    <th>Product_Quantity</th>
                    
                   
                </tr>
            </thead>
            <div>
           
            <tbody>
                <?php
                     
                    $n=1; //For Serial no.
                    $sql="SELECT * FROM tbl_product "; //table where we access data 
                    $result=mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        
                    ?>

                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['product_Name']; ?></td>
                        <td><?php echo $row['product_Category']; ?></td>
                        <td><?php echo $row['product_Measurement']; ?></td>
                        <td><?php echo $row['product_Price']; ?></td>
                        <td><?php echo $row['product_Quantity']; ?></td>
                    </tr>

                    <?php
                    $n++;
                    }
                    ?>
                
            </tbody>
        </table>

        <div class="text-center">
            <button onclick="window.print()" class="btn btn-primary btn-print-hide">Print</button>
        </div>
        <button class="product-list" onclick="window.location.href='home.php'">
        <i class="fa-solid fa-right-to-bracket"></i> Back to Home
        </button>
</body>
</html>