<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0">
      <span class="ms-1 font-weight-bold text-white">KNM SHOES ADMIN</span>
    </a>
  </div>


  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link text-white " href="index.php?id=<?php echo $_SESSION['ID'] ?>">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">dashboard</i>
      </div>
    
    <span class="nav-link-text ms-1">Homepage</span>
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link text-white " href="admin.php?id=<?php echo $_SESSION['ID'] ?>">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">groups</i>
      </div>
    
    <span class="nav-link-text ms-1">Admin</span>
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link text-white " href="categories.php?id=<?php echo $_SESSION['ID'] ?>">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">category</i>
      </div>
    
    <span class="nav-link-text ms-1">Category</span>
    </a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link text-white " href="products.php?id=<?php echo $_SESSION['ID'] ?>">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">local_mall</i>
      </div>
    
    <span class="nav-link-text ms-1">Products</span>
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link text-white " href="stocks.php?id=<?php echo $_SESSION['ID'] ?>">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">storefront</i>
      </div>
    
    <span class="nav-link-text ms-1">Stocks</span>
    </a>
    </li>
  </div>
</ul>

  
</aside>

