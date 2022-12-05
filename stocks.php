<?php $page_title = "Stocks"?>
<?php include("includes/header.php");?>
<div class="container">
  <div class="row">
    <div class="col-lg-9 mb-lg-0">
      <div class="card z-index-2">
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
                      if(isset($_GET['name']))
                      {
                        $Name = $_GET['name'];
                        if(isset($_GET['cate']))
                        {
                          $Cate = $_GET['cate'];
                          if(isset($_GET['size']))
                          {
                            $Size = $_GET['size'];
                            $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND product.Pro_Name= '$Name' AND category.Cate_Name = '$Cate' AND stock.Product_Size ='$Size' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                            $stocks_run = mysqli_query($dataconnection,$stocks);
                          }
                          else
                          {
                            $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND product.Pro_Name= '$Name' AND category.Cate_Name = '$Cate' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                            $stocks_run = mysqli_query($dataconnection,$stocks);
                          }
                        }
                        else if(isset($_GET['size']))
                        {
                          $Size = $_GET['size'];
                          $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND product.Pro_Name= '$Name' AND stock.Product_Size ='$Size' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                          $stocks_run = mysqli_query($dataconnection,$stocks);
                        }
                        else
                        {
                          $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND product.Pro_Name= '$Name' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                          $stocks_run = mysqli_query($dataconnection,$stocks);
                        }
                        
                      }
                      else 
                      {
                        if(isset($_GET['cate']))
                        {
                          $Cate = $_GET['cate'];
                          if(isset($_GET['size']))
                          {
                            $Size = $_GET['size'];
                            $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND category.Cate_Name = '$Cate' AND stock.Product_Size ='$Size' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                            $stocks_run = mysqli_query($dataconnection,$stocks);
                          }
                          else
                          {
                            $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND category.Cate_Name = '$Cate' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                            $stocks_run = mysqli_query($dataconnection,$stocks);
                          }
                        }
                        else if(isset($_GET['size']))
                        {
                          $Size = $_GET['size'];
                          $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID AND stock.Product_Size ='$Size' ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC " ;
                          $stocks_run = mysqli_query($dataconnection,$stocks);
                        }
                        else
                        {
                          $stocks = "SELECT stock.*, category.ID AS CId,category.Cate_Name AS CName,product.ID AS PiD, product.Pro_Name AS PName FROM stock,product,category WHERE stock.Category_ID = category.ID AND stock.Product_ID = product.ID ORDER BY category.ID ASC,product.ID ASC,stock.Product_Size ASC" ;
                          $stocks_run = mysqli_query($dataconnection,$stocks);
                        }
                      }
                       
                       if(mysqli_num_rows($stocks_run) > 0)
                       {
                          foreach ($stocks_run as $items) 
                          {
                            ?>
                            <tr>
                              <td><?php echo $items['CName'];?></td>
                              <td><?php echo $items['PName'] ?></td>
                              <td><?php echo $items['Product_Size'] ?></td>
                              <td><?php echo $items['Product_Size'] ?></td>
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
    <div class="col-lg-3">
      <div class="card z-index-2">
        <div class="card-header">
        <h4>Filter</h4>                          
        </div>
          <div class="card-body">
                        <form action="filter.php?id=<?php echo $_SESSION['ID']?>"  method="POST">
                        <div class="col">
                            <label for=""><strong>Name</strong></label>
                            <?php
                            if(isset($_GET['name']))
                            {
                                $Name = $_GET['name'];
                                ?>
                                <input type="text" class="form-control" name="name" placeholder="Enter Product Name"  value=<?php echo $Name?> style="border: 1px solid;">
                                <?php
                            }
                            else
                            {
                                ?>
                                <input type="text" class="form-control" name="name" placeholder="Enter Product Name"  style="border: 1px solid;">
                                <?php
                            }
                            ?>
                            
                        </div>
                        <div class="col mt-3">
                            <label for=""><strong>Category</strong></label>
                            <?php
                            if(isset($_GET['cate']))
                            {
                                $Cate = $_GET['cate'];
                                ?>
                                <input type="text" class="form-control" name="cate" placeholder="Enter Product Category"  value=<?php echo $Cate?> style="border: 1px solid;">
                                <?php
                            }
                            else
                            {
                                ?>
                                <input type="text" class="form-control" name="cate" placeholder="Enter Product Category"  style="border: 1px solid;">
                                <?php
                            }
                            ?>
                            
                        </div>
                        <div class="col mt-3">
                            <label for=""><strong>Size</strong></label>
                            <?php
                            if(isset($_GET['size']))
                            {
                                $Size = $_GET['size'];
                                ?>
                                <input type="text" class="form-control" name="size" placeholder="Enter Product Size"  value=<?php echo $Size?> style="border: 1px solid;">
                                <?php
                            }
                            else
                            {
                                ?>
                                <input type="text" class="form-control" name="size" placeholder="Enter Product Size"  style="border: 1px solid;">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col mt-3">
                            <button type="submit" name="filterstockbtn"  class="btn btn-light" style="float:right">Filter</button>
                        </div>
                        </form>
                </div>
            </div>
    </div>
  </div>
</div>
      

      <?php include("includes/footer.php");?>
      <?php include("includes/scripts.php");?>
