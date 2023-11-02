<?php
        
        include 'Navigation/nav.php';
        
$server = "localhost";
$username = "root";
$password = "";
$db = "web_inventory"; 

//Create Connection
$connection = new mysqli($server, $username, $password, $db);


    $product_Name = "";
    $product_ID = "";
    $product_Category = "";
    $product_Measurement = "";
    $product_Price = "";
    $product_Quantity = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $product_Name = $_POST["product_Name"];
        $product_ID = $_POST["product_ID"];
        $product_Category = $_POST["product_Category"];
        $product_Measurement = $_POST["product_Measurement"];
        $product_Price = $_POST["product_Price"];
        $product_Quantity = $_POST["product_Quantity"];

        do {
            if( empty($product_Name) || empty($product_ID) || empty($product_Category) || empty($product_Measurement) || empty($product_Price) || empty($product_Quantity) ) {
                $errorMessage = "All the field are required";
                break; 
            }

            //Add new product in the database
            $sql = "INSERT INTO tbl_product (product_Name , product_ID, product_Category, product_Measurement, product_Price, product_Quantity) " .
                            "VALUES ('$product_Name', '$product_ID', '$product_Category', '$product_Measurement', '$product_Price', '$product_Quantity')";
            $result = $connection->query($sql);

            if (!$result){
                $errorMessage = "Invalid query:" . $connection->error;
                break;
            }

            $product_Name = "";
            $product_ID = "";
            $product_Category = "";
            $product_Measurement = "";
            $product_Price = ""; 
            $product_Quantity = "";

            $successMessage = "Product Successfully added";

            header("Location: index.php");
            exit;

         } while (false);
    }

?>

<!DOCTYPE html>
<html>
    <head>
    <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
        <title>Inventory</title>
        <link rel="stylesheet" href="css/stockout.css">
        <link rel="stylesheet" href="Navigation/css/nav.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


</head>
<body>


    
    <div class="contact-form">
        <h2>STOCK OUT PRODUCTS</h2>
        <?php
            if( !empty($errorMessage)){
                echo "<div class ='alert alert-warning alert-dismissble fade show'  role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
        ?>
        <form method="POST">
            <label for ="productcategory"> Product Category</label>
            <select id ="product-category" name ="product_Category" value="<?php echo $product_Category; ?>" >
                <option value ="selectcategory">Select Product Category</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>


        </select>
        <label for ="productname">Product Name</label>
        <select id ="peoduct-name" name ="product_Name" value="<?php echo $product_Measurement; ?>">
        <option value ="selectcategory">Select Product Name</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>
                <option value ="#">#</option>

        </select>
        <label for="price">Price</label>
            <input type="number" name ="product_Price" placeholder ="Enter Price"  value="<?php echo $product_Measurement; ?>" required>
        <label for="quantity">Quantity</label>
            <input type="number" name ="product_Quantity" placeholder ="Enter Quantity" value="<?php echo $product_Quantity; ?>" required> 
            
            <?php
                 if( !empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                            </div
                        </div>
                    </div>
                    ";
                }
            ?> 

        <div class="button">
        <input type="submit" value="Add Product">
        </div>
        
        <button class="product-list" onclick="window.location.href='index.php'">
        <i class="fa-solid fa-clipboard-list"></i> Product List
        </button>

        </form>
        
    </div>
</body>
</html>