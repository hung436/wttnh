<?php 
	include 'inc/header.php';
//	include 'inc/slider.php';
 ?>

 <div class="main">
    <div class="content">
	<div class="rightsidebar span_3_of_1">
					<h2>Danh Mục</h2>
					<ul>
						<?php 
						$getall_category = $cat->show_category_fontend();
							if ($getall_category) {
								while ($result_allcat = $getall_category->fetch_assoc()) {
									
								
						 ?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
				      <?php 
				      }
							}
				       ?>
    				</ul>
    	
 				</div>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Laptop</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			  $laptop=$product->getproductbycatId(18);
			  while ($result = $laptop->fetch_assoc()) {
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				
				 ?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Điện thoại</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			  $laptop=$product->getproductbycatId(21);
			  while ($result = $laptop->fetch_assoc()) {
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				
				 ?>
				
    </div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Phụ kiện & thiết bị ngoại vi</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			  $laptop=$product->getproductbycatId(20);
			  while ($result = $laptop->fetch_assoc()) {
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				
				 ?>
				
    </div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Linh kiện máy tính</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			  $laptop=$product->getproductbycatId(19);
			  while ($result = $laptop->fetch_assoc()) {
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				
				 ?>
				
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>

