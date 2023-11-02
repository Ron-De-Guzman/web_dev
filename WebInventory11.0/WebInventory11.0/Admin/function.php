<?php

function archiveProduct($productId, $connection)
{
    $sqlSelect = "SELECT * FROM tbl_product WHERE id = $productId";
    $result = $connection->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $sqlArchive = "INSERT INTO tbl_archive_products (product_Name, product_ID, product_Category, product_Measurement, product_Price, product_Quantity) 
                       VALUES ('{$row['product_Name']}', '{$row['product_ID']}', '{$row['product_Category']}', '{$row['product_Measurement']}', '{$row['product_Price']}', '{$row['product_Quantity']}')";

        if ($connection->query($sqlArchive) === TRUE) {
            // Archive successful, now delete from the original table
            $sqlDelete = "DELETE FROM tbl_product WHERE id = $productId";
            if ($connection->query($sqlDelete) === TRUE) {
                return true; // Successfully archived and deleted
            }
        }
    }

    return false; // Archive or delete failed
}

function displayArchivedProducts($connection)
{
    $sql = "SELECT * FROM tbl_archive_products";
    $result = $connection->query($sql);

    if (!$result) {
        die("Invalid Query:" . $connection->error);
    }

    return $result; // Return the result set
}
    

function restoreProduct($productId, $connection)
{
    $sqlSelect = "SELECT * FROM tbl_archive_products WHERE id = $productId";
    $result = $connection->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $sqlRestore = "INSERT INTO tbl_product (product_Name, product_ID, product_Category, product_Measurement, product_Price, product_Quantity) 
                       VALUES ('{$row['product_Name']}', '{$row['product_ID']}', '{$row['product_Category']}', '{$row['product_Measurement']}', '{$row['product_Price']}', '{$row['product_Quantity']}')";

        if ($connection->query($sqlRestore) === TRUE) {
            // Restore successful, now delete from the archive table
            $sqlDelete = "DELETE FROM tbl_archive_products WHERE id = $productId";
            if ($connection->query($sqlDelete) === TRUE) {
                return true; // Successfully restored and deleted from archive
            }
        }
    }

    return false; // Restore or delete failed
}

function deletePermanently($productId, $connection)
{
    $sqlDelete = "DELETE FROM tbl_archive_products WHERE id = $productId";

    if ($connection->query($sqlDelete) === TRUE) {
        return true; // Successfully deleted permanently
    }

    return false; // Deletion failed
}

?>
