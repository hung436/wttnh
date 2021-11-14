<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>	

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nối bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<!-- <div class="container"> -->
    !<div class="row clearfix"> 
	      	<?php 
	      	$product_featheread = $product->getproduct_featheread();
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
				
				<div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card product_item">
                <div class="body">
                    <div class="cp_img">
                        <img src="admin/uploads/<?php echo $result['image'] ?>" alt="Product" class="img-fluid">
                        <div class="hover">
                            <a href="" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-plus"></i></a>
                            <a href="details.php?proid=<?php echo $result['productId'] ?>" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product_details">
                        <h5><a href="ec-product-detail.html"><?php echo $result['productName'] ?></a></h5>
                        <ul class="product_price list-unstyled">
                            <li class="old_price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>          
				<?php 
				}
				}
				 ?>
			</div>
			</div>
            <div class="content">
			<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		
    <div class="row clearfix">
			<?php 
	      	$product_new = $product->getproduct_new();
	      	if($product_new){
	      		while ($result_new = $product_new->fetch_assoc()) {
	      			    
	      	 ?>
					
				<div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card product_item">
                <div class="body">
                    <div class="cp_img">
                        <img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="Product" class="img-fluid">
                        <div class="hover">
                            <a href="" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-plus"></i></a>
                            <a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product_details">
                        <h5><a href="ec-product-detail.html"><?php echo $result_new['productName'] ?></a></h5>
                        <ul class="product_price list-unstyled">
                            <li class="old_price"><?php echo $fm->format_currency($result_new['price'])." "."VND" ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>          
			<?php 
				}
				}
			?>
			</div>
    </div>
 </div>
        	
<?php 
	include 'inc/footer.php';
 ?>
