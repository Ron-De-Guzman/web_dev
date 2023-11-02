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

            header("Location: productTable.php");
            exit;

         } while (false);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="css/inventory.css">
        <link rel="stylesheet" href="Navigation/css/nav.css">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>

</head>
<body>
  

    
    <div class="contact-form">
    
        <h2>NEW PRODUCT</h2>
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
            <label for="product_name">Product Name</label>
            <input type="text" name = "product_Name" value="<?php echo $product_Name; ?>" placeholder = "Enter Product Name" required>
            <label for="product_id">Product ID</label>
            <input type="text" name ="product_ID" value="<?php echo $product_ID; ?>" placeholder ="Enter Product ID" required>
            <label for ="productcategory"> Product Category </label>
            <select id ="product-category" name ="product_Category" value="<?php echo $product_Category; ?>" >
                <option value ="selectcategory">Select Category</option>
                <option value ="powertools">Power Tools</option>
                <option value ="lightning">Lightning</option>
                <option value ="plumbing">Plumbing</option>
                <option value ="electrical">Electrical</option>
                <option value ="handtools">Hand Tools</option>
                <option value ="lawngaren">Lawn and Garden</option>
                <option value ="plumbing">Plumbing</option>
                <option value ="houseware">Houseware</option>


        </select>
        <label for ="measurements">Unit of Measurements</label>
        <select id ="unit-measurement" name ="product_Measurement" value="<?php echo $product_Measurement; ?>">
                <option value ="inch">Inches(in)</option>
                <option value ="yard">Yard(yd)</option>
                <option value ="ounces">Ounces(oz)</option>
                <option value ="pounds">Pounds(lb)</option>
                <option value ="milimeter">Milimeter(mm)</option>
                <option value ="volts">Volts(V)</option>
                <option value ="watts">Watts(W)</option>

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