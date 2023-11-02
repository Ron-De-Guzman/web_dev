
<?php
session_start(); // Start the session at the beginning of the file

include 'Navigation/nav.php';

if(isset($_SESSION['username'])) {
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Welcome {$_SESSION['username']}',
                text: 'You have successfully logged in!'
            });
         </script>";
    unset($_SESSION['username']);
}
?>

            <meta charset="utf-8">
            <title>Home</title>
            <script src="js/search_engine.js" defer></script>
            <link rel="stylesheet" href="css/home.css">
            <link rel="stylesheet" href="Navigation/css/nav.css">
            
            <!-- PREVENT BACK-->
           <!-- <script language="javascript" type="text/javascript">
                function preventBack(){window.history.forward()};
                setTimeout("preventBack()",0);
                window.onunload=function(){null;}
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
            
            <!-- font awesome-->
            <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">     
<?php 
     include 'Navigation/searchbar.php';
     ?> 

    <!---CARD -->
                <div class="container--card">
                    <h3 class="main--title">Today's Sale</h3>
                    <div class="card--wrapper">
                        <div class="payment--card light-red" >
                            <div class="card--header">
                                <div class="amount">
                                    <span class="title">Payment Amount</span>  
                                    <span class="amount-value">$500.00</span> 
                                        </div>
                                        <i class="fas fa-dollar-sign icon"></i>
                                        </div>
                                        <span class="card--detail">**** **** **** 2406</span>
                        </div>
                        <div class="payment--card light-purple" >
                            <div class="card--header">
                                <div class="amount">
                                    <span class="title">Payment Order</span>  
                                    <span class="amount-value">$420.00</span> 
                                        </div>
                                        <i class="fas fa-list icon"></i>
                                        </div>
                                        <span class="card--detail">**** **** **** 0069</span>
                        </div>
                        <div class="payment--card light-green" >
                            <div class="card--header">
                                <div class="amount">
                                    <span class="title">Payment Order</span>  
                                    <span class="amount-value">$69.00</span> 
                                        </div>
                                        <i class="fa-solid fa-bag-shopping icon"></i>
                                        </div>
                                        <span class="card--detail">**** **** **** 1851</span>
                        </div>
                        <div class="payment--card light-blue" >
                            <div class="card--header">
                                <div class="amount">
                                    <span class="title">Payment Proceed</span>  
                                    <span class="amount-value">$360.00</span> 
                                        </div>
                                        <i class="fa-solid fa-check icon"></i>
                                        </div>
                                        <span class="card--detail">**** **** **** 6969</span>
                        </div>
                    </div>
                </div>
                <div  class="tabular--wrapper">
                    <h3 class="main--title">Finance data</h3>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction Type</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023-09-27</td>
                                        <td>Expenses</td>
                                        <td>Hardware Supplies</td>
                                        <td>$260</td>
                                        <td>Hardware Expenses</td>
                                        <td>Pending</td>
                                        <td><button>Edit</button></td>
                                    </tr>
                                    <tr>
                                        <td>2023-09-27</td>
                                        <td>Income</td>
                                        <td>Hardware Supplies</td>
                                        <td>$200</td>
                                        <td>Hardware Expenses</td>
                                        <td>Pending</td>
                                        <td><button>Edit</button></td>
                                    </tr>
                                </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">Total: $2,690.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
       