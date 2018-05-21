<?php
/*
*Template Name: Order list
*/
?>
<?php get_header(); ?>
<!-- ========================== order list =============== -->
	<div class="default_template_background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
   <div class="content_block default_template_header">
	    <h1><?php the_title(); ?></h1>
    </div>
<?php 	$curUser = get_current_user_id(); ?>
<div style="color:#000;background: #fff;">
<?php 


    
    //global $post;

    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys( wc_get_order_statuses() ),
    ) );
    $length = count($customer_orders);
    $customer = wp_get_current_user();
    //var_dump($customer);
    
    // Order count for a "loyal" customer
    $loyal_count = 5;
    

    foreach ($customer_orders as $post) {
    echo "<div style='color:green;'>";
    //echo $id = $post->ID. "+++++";
    // $parent_post_id = wp_get_post_parent_id( $post->ID );
    // $parent_post = get_post($parent_post_id);
    // $parent_post_title = $parent_post->post_title;
    //echo "<p class='parent'>" . $parent_post_title . "</p>";
    
    //echo $title = $post->post_title."     ";
    echo "<p>" . get_post_status($post->ID) . "</p>";
    echo "<p class='title'>" . $post->post_title . "</p>";
    $meta = get_post_meta($post->ID);
    $total = get_post_meta($post->ID, '_order_total');
    //var_dump($total) ;

    $order = wc_get_order( $post->ID );
	$items = $order->get_items();

	global $woocommerce;

	foreach ( $items as $item ) {
	    $product_name = $item->get_name();
	    $product_id = $item->get_product_id();
	    //echo $product_id->post_title . "+++";
	    $product_variation_id = $item->get_variation_id();
	    //echo $product_variation_id->post_title. "===";
	    $product = new WC_Product_Variation($product_variation_id);
	    //var_dump($product);
	    echo "<p>" . $product->get_title( ) . "</p>";
	    echo "<p>" . $product->attributes['date-of-the-tour'] . "</p>";

	    //$parent_data = $product->get_parent_data( );
	    //var_dump($parent_data);
	    $parent_id = $product->parent->id;
	    $parent_meta = get_post_meta($parent_id);
		$tour_tag_days = get_post_meta($parent_id, 'tour_tags_tour_tags_days');
		$tour_tag_city = get_post_meta($parent_id, 'tour_tags_tour_tags_city');
		echo "<p>" . $tour_tag_days[0] . "</p>";
		echo "<p>" . $tour_tag_city[0] . "</p>";
		//var_dump($tour_tag_days);
		//var_dump($tour_tag_city);
	    //$parent_product = get_post($parent_id);
	    //var_dump($parent_meta);
	    //echo "<span>".$product->parent->id."</span>";

	    break;
	}

    echo $total[0];
    //var_dump($meta);
    echo "</div>";
}



?>
</div>


      <div class="default_page_content content_block">

      	<?php
			// if (have_posts()):
			//   while (have_posts()) : the_post();
			//     the_content();
			//   endwhile;
			// else:
			//   echo '<p>Sorry, no posts matched your criteria.</p>';
			// endif;	
		?>
       
    </div>

<?php get_footer(); ?>