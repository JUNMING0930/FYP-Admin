<?php $page_title = "Stocks"?>
<?php include("includes/header.php");?>
<div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="addstock.php?id=<?php echo $_SESSION['ID'] ?>" class="btn btn-success float-end mb-3"><i class="fa fa-plus"></i> Add New</a>
                <h4>Stocks Management</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Product Size</th>
                      <th>Product Quantity</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                       $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size" ;
                       $stocks_run = mysqli_query($dataconnection,$stocks);
                       if(mysqli_num_rows($stocks_run) > 0)
                       {
                          foreach ($stocks_run as $items) 
                          {
                            ?>
                            <tr>
                              <td><?php echo $items['CName'];?></td>
                              <td><?php echo $items['PName'] ?></td>
                              <td><?php echo $items['Product_Size'] ?></td>
                              <td><?php echo $items['Product_Quantity'] ?></td>
                              <td><a href="editstock.php?id=<?php echo $items['ID']?>" class="btn btn-primary">Edit</a>
                              </td>
                            </tr>
                            <?php
                          }
                       }
                       else
                       {
                        echo "<strong>No records found !</strong>";
                       }
                    ?>
                      <div class="float-end">
                      <?php
                        if(isset($_SESSION['dmessage']))
                        {
                            $message = $_SESSION['dmessage'];
                            echo "<strong>$message</strong>";
                            unset($_SESSION['dmessage']);
                        }
                        ?>
                      </div>  
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      

      <?php include("includes/footer.php");?>
      <?php include("includes/scripts.php");?>