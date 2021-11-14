<?php
	
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cs = new customer();
	$cat = new category();
	$product = new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>THN Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/index.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
	<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #007fff;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php"><img style="height: 100px; weight: 500px" src="images/loago.png" alt="" /></a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Sản phẩm</a>
      </li>
	  <?php 
	  $check_cart = $ct->check_cart();
	  if ($check_cart==true) {
	  	echo '<li><a class="nav-link" href="cart.php">Giỏ hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>

	  <?php 
	  $customer_id = Session::get('customer_id'); 
	  $check_order = $ct->check_order($customer_id);
	  if ($check_order==true) {
	  	echo '<li><a class="nav-link" href="orderdetails.php">Đơn hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>
	  
	  <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	echo '';
	  }else {
	  	echo '<li><a class="nav-link" href="profile.php">Thông tin</a></li>';
	  }
	   ?>
	  <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check) {
	  	echo '<li><a class="nav-link" href="compare.php">So sánh</a> </li>';
	  }
	   ?>
	     <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check) {
	  	echo '<li><a class="nav-link" href="wishlist.php">Yêu thích</a> </li>';
	  }
	   ?>
	  
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Liên hệ</a>
      </li>

    </ul>
	
    <form class="form-inline my-2 my-lg-0">
	
      <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
    </form>
  </div>
		</div>
		<?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>   
	<div class="cart">
	<i class="fas fa-shopping-cart"></i>


						<a href="#" title="View my shopping cart" rel="nofollow">
								
								<span class="no_product">
									
								<?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
								 	$sum = Session::get("sum");
								 	$qty = Session::get("qty");
									echo $fm->format_currency($sum).'Đ'.' '.' SL: '.$qty;

								 }else {
								 	echo 'trống';
								 } 
								
								 ?>

								</span>
							</a>
						</div>
			      </div>
		
				  <?php 
			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo '<a class="nav-link color" href="login.php">Đăng nhập</a></div>'; 
			}else {
				echo '<a class="nav-link color" href="?customer_id='.Session::get('customer_id').' ">Đăng xuất</a>'; 
			}
			 ?>
</nav>
<div class="clear"></div>
</div>
