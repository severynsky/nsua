<?php
/*
Template Name: FAQ page
*/
?>
<?php get_header() ?>
 <section class="faq_page">
	<div class="faq_main_image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
	<div class="faq_page_wrap content_block">
		
		<div class="faq_page_content">
			<h1 class="faq_page_head">FREQUENTLY ASKED QUESTIONS</h1>
			<?php

					   $args = array(
									'post_type' => 'faq',
									'posts_per_page' => 50,
									'orderby' => 'date',
									'paged' => $paged,
									 'order' => 'DESC' //  ASC
									);

					$query = new WP_Query( $args );
					// Цикл
					if ( $query->have_posts() ) {
					    while ( $query->have_posts() ) {
					        $query->the_post();
					        ?>
					        <div class="faq_page_item">
									<h4 class="faq_page_qustion"><span class="faq_page_plus"><span class="faq_page_line1"></span><span class="faq_page_line2"></span></span><?php the_title(); ?></h4>
									<div class="faq_page_answer">
										<p>
											<?php the_content(); ?>
										</p>
										
									</div>
								</div>
					        <?php
					    }
					} else {					    
					}
					?>
					<div class="page_pagination">
						<?php
					$big = 999999999; // уникальное число            
                     echo paginate_links( array(
                                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                             'format'    => '?paged=%#%',
                                             'current'   => max( 1, get_query_var('paged') ),
                                             'total'     => $query->max_num_pages,
                                             'mid_size'  => 1,
                                            'prev_text' => __('<span class="pagination_arrow">&lsaquo;</span>'),
                                             'next_text' => __('<span class="pagination_arrow">&rsaquo;</span>')
                                        ) );
                                        ?>
					</div>
                                        <?php
					wp_reset_postdata();

					?>				
		</div>		
	</div>
</section>
<?php get_footer() ?>