<?php
/*
Template Name: All tours
*/
?>
<?php get_header() ?>
<!-- ============================================MAIN TOUR================================================= -->
<?php
$args = array(
    'posts_per_page' => '1',
    'post_type' => 'product',
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$query = new WP_Query( $args );
// Цикл
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>        
            
         <div class="header_tour">
         	<div class="color-overlay"></div>
         	<div class="top_block_image_overlay" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
			<div class="header_content">			
				<div style="display: none;" class="header_modal">
					<div class="header_modal-close"><svg version="1.1" id="close_modal_button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><path fill="none" stroke="#fff" stroke-width="6px" d="M5,5l30,30"></path><path fill="none" stroke="#fff" stroke-width="6px" d="M5,35l30,-30"></path></svg></div>
					<?php $tours_message = get_field('tours_page_message', 'option'); ?>
					<h2 class="header_modal-heading"><?php echo $tours_message['message_heading']; ?></h2>
					<p class="header_modal-content"><?php echo $tours_message['message_content']; ?></p>
				</div>
				<div class="header_tour-info">
					<div class="tour_main-info">
						
						<span class="tour_city_days"><span><?php the_field('tour_tags_days'); ?></span>|<span><?php the_field('tour_tags_city'); ?></span></span>
						<?php $post_id = get_the_ID();  $fcet = get_the_category(); ?>
						<span  class="tour_inclusive">All inclusive</span>						
					</div>
					<div class="header_tour-name">
						  <a class="tour-name_link" href="<?php echo get_the_permalink(); ?>"> <h2 class="tour-name"><?php the_title(); ?></h2></a>
						<span class="tour_to_favorite white_favorite">
							<?php $link_favor = get_favorites_button(get_the_ID()); 
								echo $link_favor;
							?>
							<script type="text/javascript">
								(function(){
									jQuery('a.tour_to_favorite').click(function(){
										return false;
									});
								})();
							</script>

						</span>
					</div>
					
					<div class="tour-tag">

						<?php
						if( have_rows('tags_on_main_page') ):
							$tag_item = 1;
							while ( have_rows('tags_on_main_page') ) : the_row();
								if($tag_item > 1){ echo "|";}
						?>
							<span class="tour-tag_item"><?php the_sub_field('main_tags_item'); ?></span>	
						<?php
							$tag_item++;
							endwhile;
							else :
						endif;
						?>						
					</div>
					<a href=""></a>
					
				</div>
			</div>
		</div>        
        <?php
    }
} else {   
}
wp_reset_postdata();
wp_reset_query();
?>

		<!-- =================================================ALL TOURS=============================================== -->
	<section class="all_tours">

		<?php
      
			$args = array(
			    'posts_per_page' => '12',
			    'post_type' => 'product',
			    'offset' => 1,
			    'orderby' => 'menu_order',
			    'order' => 'ASC'
			);
			$query = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) {
			    while ( $query->have_posts() ) {
			        $query->the_post();
			        ?>        
			        
			         <div class="all_tours-item">
						<div class="tour_background_image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
						
						<div class="all_tours-item_layer"></div>
						<div class="all_tours-item_wrap">
							<a class="tour-name_link tour_first_link" href="<?php echo get_the_permalink(); ?>">
								<div class="tour_main-info">									
									<span class="tour_city_days"><span><?php the_field('tour_tags_days'); ?></span>|<span><?php the_field('tour_tags_city'); ?></span></span>
									<span  class="tour_inclusive"><?php the_field('tour_tag_inclusiv'); ?></span>	
								</div>
							</a>
								<div class="header_tour-name">
									<a class="tour-name_link" href="<?php echo get_the_permalink(); ?>">
										<h2 class="tour-name"><?php the_title(); ?></h2>
									</a>
									<span class="tour_to_favorite white_favorite">
										<?php $link_fsavor = get_favorites_button(get_the_ID()); 
											echo $link_fsavor;
										?>
									</span>									
								</div>
								<a class="tour-name_link" href="<?php echo get_the_permalink(); ?>">
									<div class="tour-tag">
										<?php
											if( have_rows('tags_on_main_page') ):
												$tag_item = 1;
												while ( have_rows('tags_on_main_page') ) : the_row();
													if($tag_item > 1){ echo "|";}
											?>
												<span class="tour-tag_item"><?php the_sub_field('main_tags_item'); ?></span>	
											<?php
												$tag_item++;
												endwhile;
												else :
											endif;
											?>								
									</div>
								</a>
								<div class="tour_arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/main-img/tour arrow right.svg"></div>
						</div>
						<!-- </a> -->
					</div>   


			<?php
			    }
			} else {   
			}
			wp_reset_postdata();
			wp_reset_query();
			?>

			
	</section>

	<?php get_footer() ?>