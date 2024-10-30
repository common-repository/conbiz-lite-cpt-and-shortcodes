<?php

/**
 * ConBiz custom functions 
 *
 * Author : WingThemes 
 */



/**
 * Remove auto P tag form shortcode
 */

if( !function_exists('conbiz_remove_wpautop') ){
	function conbiz_remove_wpautop( $content, $autop = false ) {

		if ( $autop ) {
			$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
		}

		return do_shortcode( shortcode_unautop( $content) );
	}
}



/**
 * Remove br tags form bootstrap shortcode
 */

if( !function_exists('conbiz_remove_br_tag_form_shortcode') ){
	function conbiz_remove_br_tag_form_shortcode($content) {

	    $block = join('|',array( 'container', 'row', 'sub_row', 'column', 'sub_column', 'section', 'section_title', 'call_to_action_large', 'conbiz_portfolio', 'conbiz_text', 'conbiz_image','conbiz_button_group','conbiz_button', 'normal_title', 'contact-form-7','conbiz_map' ));

	    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

		return $rep;
	}
}
add_filter('the_content', 'conbiz_remove_br_tag_form_shortcode');





/**
 * Bootstrap container shortcode
 */

add_shortcode( 'container', 'conbiz_bootstrap_container' );
if( !function_exists('conbiz_bootstrap_container') ){
	function conbiz_bootstrap_container($atts, $content = null){

		extract(shortcode_atts(array(
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz_container container<?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}




/**
 * Bootstrap row shortcode
 */

add_shortcode( 'row', 'conbiz_bootstrap_row' );
if( !function_exists('conbiz_bootstrap_row') ){
	function conbiz_bootstrap_row($atts, $content = null){

		extract(shortcode_atts(array(
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz_row row<?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Bootstrap sub-row shortcode
 */

add_shortcode( 'sub_row', 'conbiz_bootstrap_sub_row' );
if( !function_exists('conbiz_bootstrap_sub_row') ){
	function conbiz_bootstrap_sub_row($atts, $content = null){

		extract(shortcode_atts(array(
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz_sub_row row<?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Bootstrap column shortcode
 */

add_shortcode( 'column', 'conbiz_bootstrap_column' );
if( !function_exists('conbiz_bootstrap_column') ){
	function conbiz_bootstrap_column($atts, $content = null){

		extract(shortcode_atts(array(
		  'grid' 	=> 'md', // lg, md, sm, xs
		  'num' 	=> 12,
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz_column col-<?php echo $grid ;?>-<?php echo $num ;?><?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Bootstrap sub-column shortcode
 */

add_shortcode( 'sub_column', 'conbiz_bootstrap_subcolumn' );
if( !function_exists('conbiz_bootstrap_subcolumn') ){
	function conbiz_bootstrap_subcolumn($atts, $content = null){

		extract(shortcode_atts(array(
		  'grid' 	=> 'md',
		  'num' 	=> 12,
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz_subcolumn col-<?php echo $grid ;?>-<?php echo $num ;?><?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Section shortcode
 */

add_shortcode( 'section', 'conbiz_section_function' );
if( !function_exists('conbiz_section_function') ){
	function conbiz_section_function($atts, $content = null){

		extract(shortcode_atts(array(
	      'x_class' 		=> '',
	      'padding_top'		=> 80,
	      'padding_bottom'	=> 80,
	      'bg'				=> '',
	      'bg_color'		=> '',
	      'bg_img'			=> '',
	      'color'			=> '',
	      'align'			=> '',
	      'parallax'		=> 'no', // yes or no
	    ), $atts));

		$id = rand(100,1000);

		ob_start();
	    ?>
	    <section class="conbiz_section conbiz_section_<?php echo $id; ?><?php echo( $x_class ? ' '.$x_class : '' );?>" style="padding-top: <?php echo $padding_top; ?>px; padding-bottom: <?php echo $padding_bottom; ?>px;<?php echo( $bg ? ' background: '.$bg.';' : '' );?><?php echo( $bg_img ? ' background: transparent url(\''.$bg_img.'\');' : '' );?><?php echo( $align ? ' text-align: '.$align.';' : '' );?><?php echo( $color ? ' color: '.$color.'' : '' );?>"<?php echo ( ( $parallax == 'yes') ? ' data-stellar-background-ratio="0.5"' : ''); ?>>

	    	<?php if( $bg_color || $color ):?>
	    		<style>
	    			<?php if( $bg_color ):?>.conbiz_section_<?php echo $id; ?>:before { background: <?php echo $bg_color; ?>; }<?php endif; ?>
	    			<?php if( $color ):?>.conbiz_section_<?php echo $id; ?> p { color: <?php echo $color; ?>; }<?php endif; ?>
	    		</style>
	    	<?php endif; ?>

	    		<?php echo do_shortcode( $content ); ?>

	    	<?php if($bg_color):?></div><!-- conbiz_section_inner --><?php endif; ?>

	    </section>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Section title
 */

add_shortcode( 'section_title', 'conbiz_section_title_function' );
if( !function_exists('conbiz_section_title_function') ){
	function conbiz_section_title_function($atts){

		extract(shortcode_atts(array(
	      'title_part_1' 		=> '',
	      'title_part_2' 		=> '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="heading">
          <div class="section-title"><?php echo $title_part_1; ?> <span><?php echo $title_part_2; ?></span></div>              
        </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Normal title
 */

add_shortcode( 'normal_title', 'conbiz_normal_title_function' );
if( !function_exists('conbiz_normal_title_function') ){
	function conbiz_normal_title_function($atts){

		extract(shortcode_atts(array(
	      'text' 			=> '',
	      'margin_bottom' 	=> '22',
	      'margin_top' 	    => '0',
	    ), $atts));

		ob_start();
	    ?>
	    <?php if( $text ): ?><h2 class="big-title" style="margin-bottom:<?php echo $margin_bottom ?>px; margin-top:<?php echo $margin_top ?>px"><?php echo $text; ?></h2><?php endif; ?>
	    <?php
	    return ob_get_clean();
	}
}


/**
 * ConBiz Bootstrap Carousel Slider
 */

add_shortcode( 'conbiz_slider', 'conbiz_bootstrap_carousel_slider' );
if( !function_exists('conbiz_bootstrap_carousel_slider') ){
	function conbiz_bootstrap_carousel_slider($atts){

		extract(shortcode_atts(array(
		  'orderby' 		=> 'menu_order',
		  'order' 			=> 'ASC',
		  'autoplay' 		=> 'true', // false
		  'interval' 		=> 3000,
		  'number_of_posts'	=> -1,	
		  'category'		=> '',
		  'overlay_color'	=> 'rgba(0, 0, 0, 0.2)',
		), $atts));	

		$wp_query = new WP_Query( array( 
			'post_type' 			=> 'conbiz_slider', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $number_of_posts,
		));

		$slide_count = $wp_query->post_count;
		$slider_id = rand(10,100);
		ob_start();
		?>
		<?php if ($wp_query->have_posts()){ ?>
		<div id="carousel-area">
			<div id="carousel-slider-<?php echo $slider_id; ?>" class="carousel slide" data-interval="3000">

				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php 
						$i = 0;
						for ($i=0; $i < $slide_count; $i++) { 
							echo '<li data-target="#carousel-slider-'.$slider_id.'" data-slide-to="'.$i.'" '. ($i == 0 ? 'class="active"' : '') .' ></li>';
						}
					?>
				</ol>

			  <div class="carousel-inner">

			    	<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
					<?php 
						global $post;
						$conbiz_slider_meta = get_post_meta( $post->ID, '_conbiz_slider_meta', false );
					?>
					
					<div class="item <?php if( $wp_query->current_post == 0 ):?>active<?php endif; ?>">
						<?php the_post_thumbnail(); ?>
						<div class="carousel-caption">
							<h2><?php the_title();?></h2>
							<h3><?php echo get_the_content();?></h3>
							<?php 
								if( !empty($conbiz_slider_meta) && is_array($conbiz_slider_meta) ){
									$slider_buttons = call_user_func_array('array_merge', $conbiz_slider_meta);
									$i = 1;
									foreach ($slider_buttons['conbiz_slider_btn'] as $slider_button) {
										$new_window = (array_key_exists('conbiz_slider_btn_new_window',$slider_button) ? $slider_button['conbiz_slider_btn_new_window'] : '');
										$btn_icon = (array_key_exists('conbiz_slider_btn_icon',$slider_button) ? $slider_button['conbiz_slider_btn_icon'] : '');
										$btn_type = (array_key_exists('conbiz_slider_btn_type',$slider_button) ? $slider_button['conbiz_slider_btn_type'] : '');

										$output = '<a class="btn btn-lg '.$btn_type.'" href="'.$slider_button['conbiz_slider_btn_url'].'"  '.($new_window ? 'target="_blank"' : '').'>';
										$output .= ($btn_icon ? '<i class="'.$btn_icon.'"></i>' : '');
										$output .= $slider_button['conbiz_slider_btn_text'];
										$output .= '</a>';

										echo $output;
										
										if (++$i == 3) break; // max 2 button in slider
									}
								}

							?>
						</div>
					</div>
					
					<?php endwhile; ?>
			  	</div><!-- Carousel Item Ends -->

			  	<?php if($slide_count > 1):?>
				
					<a class="left carousel-control" href="#carousel-slider-<?php echo $slider_id; ?>" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a class="right carousel-control" href="#carousel-slider-<?php echo $slider_id; ?>" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				
				<?php endif; ?>
			</div>
		</div>
		<?php
		}
		else{
			_e( '<h2 class="text-center">'.'No Post Found For Slider.'.'</h2>', 'conbiz' );
		}
		wp_reset_postdata();
		return ob_get_clean();
	}
}




/**
 * Call to action
 */

add_shortcode( 'call_to_action', 'conbiz_call_to_action' );
if( !function_exists('conbiz_call_to_action') ){
	function conbiz_call_to_action($atts){

		extract(shortcode_atts(array(
		  'text' 		=> '',
		  'btn_text' 	=> '',
		  'btn_url' 	=> '',
		), $atts));	

		ob_start();
		?>
			<div class="call-to-action">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<?php echo ( $text ? '<h3>'.$text.'</h3>' : '' ); ?>
						</div>
						<div class="col-md-4 col-sm-4">
							<?php echo ( $btn_text ? '<a href="'.$btn_url.'" class="btn btn-border">'.$btn_text.'</a>' : '' ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}
}




/**
 * Service 1
 */

add_shortcode( 'service_one', 'conbiz_service_one' );
if( !function_exists('conbiz_service_one') ){
	function conbiz_service_one( $atts ){
		extract(shortcode_atts(array(
	      'btn_url'  		=> '',
	      'btn_text'  		=> __( 'Read More','conbiz' ),
	      'icon'  			=> '',
	      'title'  			=> '',
	      'subtitle'  		=> '',
	      'description'  	=> '',
	    ), $atts));

		ob_start();
		?>
		<div class="service-box">                
			<div class="service-head">
				<?php if($icon):?><span class="icon"><i class="<?php echo $icon; ?>"></i></span><?php endif; ?>
				<?php if($title):?><h2><?php echo $title; ?></h2><?php endif; ?>
				<?php if($subtitle):?><p class="desc"><?php echo $subtitle; ?></p><?php endif; ?>
			</div>
			<div class="service-content">
				<?php if($description):?><p><?php echo $description; ?></p><?php endif; ?>
				<?php if($btn_url):?><a href="<?php echo $btn_url; ?>" class="btn btn-effect"><?php echo $btn_text; ?> <i class="icon-arrow-right"></i></a><?php endif; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}



/**
 * Service 2
 */

add_shortcode( 'service_two', 'conbiz_service_two' );
if( !function_exists('conbiz_service_two') ){
	function conbiz_service_two( $atts ){
		extract(shortcode_atts(array(
	      'title_url'  		=> '',
	      'icon'  			=> '',
	      'title'  			=> '',
	      'subtitle'  		=> '',
	      'description'  	=> '',
	    ), $atts));

		ob_start();
		?>
		<div class="featured-content">
			<div class="featured-header">
				<?php if($icon):?><i class="<?php echo $icon; ?>"></i><?php endif; ?>
				<div class="featured-title">
					<?php if($title):?>
						<h4>
						<?php if($title_url):?><a href="#"><?php endif; ?>
						<?php echo $title; ?>
						<?php if($title_url):?></a><?php endif; ?>
						</h4>
					<?php endif; ?>
					<?php if($subtitle):?><p><?php echo $subtitle; ?></p><?php endif; ?>
				</div>
			</div>                
			<?php if($description):?><p><?php echo $description; ?></p><?php endif; ?>
		</div>
		<?php
		return ob_get_clean();
	}
}



/**
 * Call to action large
 */

add_shortcode( 'call_to_action_large', 'conbiz_call_to_action_large' );
if( !function_exists('conbiz_call_to_action_large') ){
	function conbiz_call_to_action_large( $atts ){
		extract(shortcode_atts(array(
	      'btn_url'  		=> '',
	      'btn_text'  		=> __( 'Contact US','conbiz' ),
	      'title'  			=> '',
	      'description'  	=> '',
	      'img'				=> '',
	    ), $atts));

		ob_start();
		?>
		<div class="company-ever">
			<div class="container">
				<div class="row company-bg">
					<?php if($img):?>
						<div class="col-md-6">
							<div class="company-thumb"><img src="<?php echo $img; ?>"></div>
						</div>
					<?php endif; ?>
					<div class="col-md-6">
						<div class="content">
							<?php if($title):?><h2><?php echo $title; ?></h2><?php endif; ?>
							<?php if($description):?><p><?php echo $description; ?></p><?php endif; ?>
							<?php if($btn_url):?><div class="compayt-button"><a href="<?php echo $btn_url; ?>" class="btn btn-effect"><?php echo $btn_text; ?> <i class="icon-envelope"></i></a></div><?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}



/**
 * Portfolio Shortcode
 */

add_shortcode( 'conbiz_portfolio', 'conbiz_portfolio_shortcode' );
if( !function_exists('conbiz_portfolio_shortcode') ){
	function conbiz_portfolio_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'post'  			=> -1,
	      'order' 			=> 'ASC',
	      'orderby' 		=> 'menu_order',
	      'column' 			=> 4, // 4 , 3
	      'category'		=> '',
	    ), $atts));

		$wp_query = new WP_Query( array( 
			'post_type' 				=> 'conbiz_portfolio', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'conbiz_portfolio_category'	=> $category,
		));
		ob_start();
		if ($wp_query->have_posts()){
		?>

		<div id="portfolio-list">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>

				<?php 
					global $post;
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' );
					$thumbnail_mata = get_post_meta($thumb,'_wp_attachment_image_alt',true);
				?>

				<div <?php post_class( 'col-md-'.$column.' col-sm-6 col-xs-12 '.conbiz_taxonomies_as_class('conbiz_portfolio_category').'' ) ?>>
					<div class="portfolio-item">
						<?php the_post_thumbnail( 'portfoliot-thumbnail' ) ?>
						<div class="overlay">
							<div class="icon">
								<a href="<?php the_permalink();?>"><i class="icon-location-pin left"></i></a>                  
								<a href="<?php echo $img_url; ?>" class="lightbox"><i class="icon-magnifier right"></i></a>
							</div>               
						</div>  
						<div class="content">
							<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							<p><?php conbiz_print_commma_serapated_taxonomies_without_link('conbiz_portfolio_category'); ?></p>
						</div>         
					</div>            
				</div>
			<?php endwhile; ?>
		</div>
		<?php
		}
		else{
			_e( '<h2 class="text-center">'.'No Post Found For Portfolio.'.'</h2>', 'conbiz' );
		}
		wp_reset_postdata();  // Reset
		return ob_get_clean();
		}
}




/**
 * Image Shortcode
 */

add_shortcode( 'conbiz_image', 'conbiz_image_shortcode' );
if( !function_exists('conbiz_image_shortcode') ){
	function conbiz_image_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'src'  		=> '',
	      'alt'  		=> '',
	      'align'  		=> '',
	    ), $atts));

		ob_start();
		?>
		<div class="featured-thumb" style="<?php echo( $align ? 'text-align: '.$align.'' : '' );?>">
			<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
		</div>
		<?php
		return ob_get_clean();
	}
}




/**
 * Text Block
 */

add_shortcode( 'conbiz_text', 'conbiz_text_block_shortcode' );
if( !function_exists('conbiz_text_block_shortcode') ){
	function conbiz_text_block_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'align'  		=> '',
	      'text'  		=> '',
	    ), $atts));

		ob_start();
		?>
		<p class="description" style="<?php echo( $align ? 'text-align: '.$align.'' : '' );?>">
			<?php echo $text; ?>
		</p>
		<?php
		return ob_get_clean();
	}
}



/**
 * Team Members
 */

add_shortcode( 'conbiz_team', 'conbiz_team_members_shortcode' );
if( !function_exists('conbiz_team_members_shortcode') ){
	function conbiz_team_members_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'posts'  		=> -1,
	      'orderby' 	=> 'date',
	      'order' 		=> 'DESC',
	      'category' 	=> '',
	    ), $atts));

	    $wp_query = new WP_Query( array( 
			'post_type' 			=> 'conbiz_team', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $posts,
			'team_category'			=> $category
		));

		ob_start();
		?>
		<?php if ($wp_query->have_posts()){ ?>
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
		<?php 
			global $post;
			$team_meta 			= get_post_meta( $post->ID, '_conbiz_team_meta', true );
			$team_designation 	= (array_key_exists('team_designation',$team_meta) ? $team_meta['team_designation'] : '');
			$team_short_disc 	= (array_key_exists('team_short_disc',$team_meta) ? $team_meta['team_short_disc'] : '');
			$team_social_group 	= (array_key_exists('team_social_group',$team_meta) ? $team_meta['team_social_group'] : '');
		?>
			<div class="col-md-3 col-sm-6">
				<div class="team-member">
					<div class="team-thumbnail">
						<?php the_post_thumbnail(); ?>
						<div class="overlay">
							<?php echo( $team_short_disc ? '<p class="text">'.$team_short_disc.'</p>' : '' ); ?>
							<div class="info name">
								<h4><?php the_title(); ?></h4>
								<?php echo( $team_designation ? '<p>'.$team_designation.'</p>' : '' ); ?>
							</div>
							<?php 
								if( !empty($team_social_group) && is_array($team_social_group) ){

									echo '<div class="social-media">';

									$social_urls = call_user_func_array('array_merge', $team_social_group);

										foreach ($team_social_group as $social_url) {
											$_social_url = (array_key_exists('team_social_url',$social_url) ? $social_url['team_social_url'] : '');
											$_social_icon = (array_key_exists('team_social_icon',$social_url) ? $social_url['team_social_icon'] : '');

											$output = '<a class="team-social" href="'.$_social_url.'"  target="_blank">';
											$output .= ($_social_icon ? '<i class="'.$_social_icon.'"></i>' : '');
											$output .= '</a>';

											echo $output;
										}

									echo '</div>';

								}
							?>
						</div>
					</div>
					<div class="info">
						<h4><?php the_title(); ?></h4>
						<?php echo( $team_designation ? '<p>'.$team_designation.'</p>' : '' ); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php
		}
		else{
			_e( '<h2 class="text-center">'.__( 'No Post Found For Team.','conbiz' ).'</h2>', 'conbiz' );
		}
		wp_reset_postdata();
		return ob_get_clean();
	}
}


/**
 * Counter
 */

add_shortcode( 'conbiz_counter', 'conbiz_counter_shortcode' );
if( !function_exists('conbiz_counter_shortcode') ){
	function conbiz_counter_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'icon'  		=> '',
	      'title'  		=> __( 'Counter Title','conbiz' ),
	      'number'  	=> '100',
	    ), $atts));

		ob_start();
		?>
		<div class="counter-item">
		<?php if($icon):?><div class="icon"><i class="<?php echo $icon; ?>"></i></div><?php endif; ?>
		<?php if($title):?><h5><?php echo $title;  ?></h5><?php endif ?>
		<hr>
		<?php if( $number ): ?><div class="timer" data-to="<?php echo $number; ?>" data-speed="5000"><?php echo $number; ?></div></div><?php endif; ?>
		<?php
		return ob_get_clean();
	}
}


/**
 * Blog post Carousel
 */

add_shortcode( 'conbiz_post_carousel', 'conbiz_blog_carousel_shortcode' );
if( !function_exists('conbiz_blog_carousel_shortcode') ){
	function conbiz_blog_carousel_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'posts'  						=> -1,
	      'orderby' 					=> 'date',
	      'order' 						=> 'DESC',
	      'category' 					=> '',
	      'title_character_limit' 		=> 40,
	      'excerpt_character_limit' 	=> 244,
	    ), $atts));

	    $wp_query = new WP_Query( array( 
			'post_type' 			=> 'post', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $posts,
			'category'				=> $category,
			'ignore_sticky_posts' 	=> true,
		));

		ob_start();
		?>

		<?php if ($wp_query->have_posts()){ ?>

		<div class="projects-carousel touch-carousel projects-carousel-<?php echo ( is_rtl() ? 'rtl' : 'default' );?>">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
			<div class="col-md-12">
				<div class="projects-box item">
				  
		      	<?php 
					if ( has_post_thumbnail() ) {
						?>
						<div class="projects-thumb">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'large' );?>
							</a>
						</div>	
						<?php
					} 
				?>
				  
				  <div class="projects-content">
				    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				    <div class="recent-meta">
				      <span class="date"><i class="fa fa-file-text-o"></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
				      <span class="comments"><i class="fa fa-comments-o"></i> <?php comments_number( __( 'No Comments','conbiz' ), __( 'one Comment','conbiz' ), __( '% Comments','conbiz' ) ); ?>.</span>
				    </div>
				    <p class="projects-desc"><?php echo conbiz_custom_excerpt( $excerpt_character_limit ); ?></p>
				    <a href="<?php the_permalink(); ?>" class="btn btn-effect"><?php _e( 'Read More','conbiz' ); ?> <i class="icon-arrow-right"></i></a>
				  </div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php
		}
		else{
			_e( '<h2 class="text-center">'.'No Post Found For Blog.'.'</h2>', 'conbiz' );
		}
		wp_reset_postdata();
		return ob_get_clean();
	}
}




/**
 * Testimonial Carousel
 */

add_shortcode( 'conbiz_testimonial', 'conbiz_testimonial_carousel_shortcode' );
if( !function_exists('conbiz_testimonial_carousel_shortcode') ){
	function conbiz_testimonial_carousel_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'posts'  		=> -1,
	      'orderby' 	=> 'date',
	      'order' 		=> 'DESC',
	      'category' 	=> '',
	    ), $atts));

	    $wp_query = new WP_Query( array( 
			'post_type' 			=> 'conbiz_testimonial', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $posts,
			'testimonial_category'	=> $category
		));

		ob_start();
		?>

		<?php if ($wp_query->have_posts()){ ?>

		<div class="testimonial-carousel testimonial-carousel-<?php echo ( is_rtl() ? 'rtl' : 'default' );?>">

			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<?php 
					global $post;
					$client_company_name = '';
					$testimonial_meta 		= get_post_meta( $post->ID, '_conbiz_testimonials_meta', true );
					if( !empty( $testimonial_meta ) ){
						$client_company_name 	= (array_key_exists('client_company_name',$testimonial_meta) ? $testimonial_meta['client_company_name'] : '');
					}
				?>
				<div class="item active text-center">
					<?php the_post_thumbnail( 'medium', array( 'class' => 'img-member' ) ); ?>
					<div class="client-info">
						<h2 class="client-name"><?php the_title(); ?> <?php echo( $client_company_name ? '<span>'.$client_company_name.'</span>' : '' ); ?></h2>
					</div>
					<div class="col-md-8 col-md-offset-2">
						<div class="testimonial-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>

		</div>

		<?php
		}else{
			_e( '<h2 class="text-center">'.'No Post Found For Testimonial.'.'</h2>', 'conbiz' );
		}
		wp_reset_postdata();
		return ob_get_clean();
	}
}



/**
 * Calient Logo Carousel
 */

add_shortcode( 'conbiz_logo_slider', 'conbiz_logo_carousel_shortcode' );
if( !function_exists('conbiz_logo_carousel_shortcode') ){
	function conbiz_logo_carousel_shortcode( $atts ){
		extract(shortcode_atts(array(
	      'posts'  		=> -1,
	      'order' 		=> 'DESC',
	      'orderby' 	=> 'date',
	      'category'	=> ''
	    ), $atts));

		$wp_query = new WP_Query( array( 
			'post_type' 			=> 'conbiz_client_logos', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $posts,
			'client_logo_category'	=> $category,
		));

		ob_start();
		?>

		<?php if ($wp_query->have_posts()){ ?>

		<div class="client-logo-slider touch-carousel client-logo-slider-<?php echo ( is_rtl() ? 'rtl' : 'default' );?>">

			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<?php 
					global $post;
					$client_logo_url = '';
					$clients_logos_meta = get_post_meta( $post->ID, '_clients_logos_meta', true );
					if( !empty( $clients_logos_meta ) ){
						$client_logo_url = (array_key_exists('client_logo_url',$clients_logos_meta) ? $clients_logos_meta['client_logo_url'] : '');
					}
				?>

				<div class="client-logo item" >
					<div class="client-item">
						<?php echo( $client_logo_url ? '<a href="'.$client_logo_url.'">' : '' ); ?>
					  		<?php the_post_thumbnail(); ?>
					  	<?php echo( $client_logo_url ? '</a>' : '' ); ?>
					</div>
				</div>

			<?php endwhile; ?>

		</div>

		<?php
		}
		else{
			_e( '<h2 class="text-center">'.'No Post Found For Logos.'.'</h2>', 'conbiz' );
		}
		wp_reset_postdata();
		return ob_get_clean();
	}
}



/**
 * Button Group
 */

add_shortcode( 'conbiz_button_group', 'conbiz_button_group_container' );
if( !function_exists('conbiz_button_group_container') ){
	function conbiz_button_group_container($atts, $content = null){

		extract(shortcode_atts(array(
	      'x_class' => '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="conbiz-group-btn group-btn<?php echo( $x_class ? ' '.$x_class : '' );?>">
	    	<?php echo do_shortcode( $content ); ?>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Button
 */

add_shortcode( 'conbiz_button', 'conbiz_button_container' );
if( !function_exists('conbiz_button_container') ){
	function conbiz_button_container( $atts ){

		extract(shortcode_atts(array(
	      'btn' 		=> 'btn-effect', // 
	      'btn_url' 	=> '',
	      'btn_text' 	=> __( 'Read More','conbiz' ),
	      'x_class' 	=> '',
	    ), $atts));

		ob_start();
	    ?>
	    <?php if( $btn_text ): ?><a href="<?php echo $btn_url; ?>" class="btn <?php echo $btn; ?><?php echo( $x_class ? ' '.$x_class : '' );?>"><?php echo $btn_text; ?></a><?php endif; ?>
	    <?php
	    return ob_get_clean();
	}
}



/**
 * Contact Address
 */

add_shortcode( 'contact_address', 'conbiz_contact_address' );
if( !function_exists('conbiz_contact_address') ){
	function conbiz_contact_address( $atts ){

		extract(shortcode_atts(array(
	      'address' 	=> '',
	      'phone' 		=> '',
	      'email' 		=> '',
	      'time' 		=> '',
	    ), $atts));

		ob_start();
	    ?>
	    <div class="contact-datails">
        	<?php if( $address ): ?><p><i class="icon-location-pin"></i> <?php echo $address; ?></p><?php endif; ?>
          	<?php if( $phone ): ?><p><i class="icon-call-out"></i> <?php echo $phone; ?></p><?php endif; ?>
          	<?php if( $email ): ?><p><i class="icon-envelope"></i> <?php echo $email; ?></p><?php endif; ?>
          	<?php if( $time ): ?><p><i class="icon-clock"></i> <?php echo $time; ?></p><?php endif; ?>
        </div>
	    <?php
	    return ob_get_clean();
	}
}




/**
 * Google Map
 */

if( !function_exists('conbiz_google_map') ){

	function conbiz_google_map($atts){
		extract(shortcode_atts( array(
			'zoom' 			=> 9,
			'height' 		=> 460,
			'latitude' 		=> 40.711556,
			'longitude' 	=> -74.009214,
		), $atts));
		$map_id = rand(10,100);
		ob_start();
		?>

		<div id="conbix-google-map-<?php echo $map_id; ?>" style="height:<?php echo $height; ?>px"></div>
		
		  
		<script type="text/javascript">
		jQuery(function() {
			var map;
			var plain = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
			var mapCoordinates = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);


			var markers = [];
			var image = new google.maps.MarkerImage(
			  '<?php echo get_template_directory_uri();?>/inc/assets/images/map-marker.png',
			  new google.maps.Size(84, 70),
			  new google.maps.Point(0, 0),
			  new google.maps.Point(60, 60)
			);

			function addMarker() {
			  markers.push(new google.maps.Marker({
			    position: plain,
			    raiseOnDrag: false,
			    icon: image,
			    map: map,
			    draggable: false
			  }
			                                     ));
			  
			}

			function initialize() {
			  var mapOptions = {
			    backgroundColor: "#F0EDE5",
			    zoom: <?php echo $zoom; ?>,
			    disableDefaultUI: true,
			    center: mapCoordinates,
			    zoomControl: false,
			    scaleControl: false,
			    scrollwheel: false,
			    disableDoubleClickZoom: true,
			    mapTypeId: google.maps.MapTypeId.ROADMAP,
			    styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
			    
			  }
			      ;
			  map = new google.maps.Map(document.getElementById('conbix-google-map-<?php echo $map_id; ?>'), mapOptions);
			  addMarker();
			  
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		});
		</script>

		<?php
		return ob_get_clean();
	}

}
add_shortcode( 'conbiz_map','conbiz_google_map' );
