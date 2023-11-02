<?php
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "web_inventory"; 

    //Create a connection
    $connection = new mysqli($server, $username, $password, $db);

    $id = "";
    $product_Name = "";
    $product_ID = "";
    $product_Category = "";
    $product_Measurement = "";
    $product_Price = "";
    $product_Quantity = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //GET method: Show the data of product

        if(!isset($_GET["id"])){
            header("location: productTable.php");
            exit;
        }

        $id = $_GET["id"];

        //Read the row of the selected Product from the database table
        $sql = "SELECT * FROM tbl_product WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: productTable.php");
            exit;
        }

        $product_Name = $row["product_Name"];
        $product_ID = $row["product_ID"];
        $product_Category = $row["product_Category"];
        $product_Measurement = $row["product_Measurement"];
        $product_Price = $row["product_Price"];
        $product_Quantity = $row["product_Quantity"];
    }
    else{
        //POST method: Update the data of product
        $id = $_POST["id"];
        $product_Name = $_POST["product_Name"];
        $product_ID = $_POST["product_ID"];
        $product_Category = $_POST["product_Category"];
        $product_Measurement = $_POST["product_Measurement"];
        $product_Price = $_POST["product_Price"];
        $product_Quantity = $_POST["product_Quantity"];

        do{
            if( empty($id) || empty($product_Name) || empty($product_ID) || empty($product_Category) || 
            empty($product_Measurement) || empty($product_Price) || empty($product_Quantity) ) {
                $errorMessage = "All the field are required";
                break; 
            }

            $sql = "UPDATE tbl_product " .
                "SET product_Name = '$product_Name', product_ID = '$product_ID', product_Category = '$product_Category', product_Measurement = '$product_Measurement', product_Price = '$product_Price', product_Quantity = '$product_Quantity' " .
                "WHERE id = $id";


                $result = $connection->query($sql);

                if (!$result){
                    $errorMessage = "Invalid query:" . $connection->error;
                    break;
                }

                $successMessage = "Product Updated Successfully ";

                header("LOCATION:productTable.php");
                exit;

        } while(true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Hardware</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Product</h2>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_Name" value="<?php echo $product_Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_ID" value="<?php echo $product_ID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Category</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_Category" value="<?php echo $product_Category; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Measurement</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_Measurement" value="<?php echo $product_Measurement; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_Price" value="<?php echo $product_Price; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_Quantity" value="<?php echo $product_Quantity; ?>">
                </div>
            </div>

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

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class=" col-sm-3 d-grid">
                   <a class="btn btn-outline-primary" href="index.php" role"button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>