<?php 
		$dimita_settings = dimita_global_settings();
		$show_minicart = (isset($dimita_settings['show-minicart']) && $dimita_settings['show-minicart']) ? ($dimita_settings['show-minicart']) : false;
		$enable_sticky_header = ( isset($dimita_settings['enable-sticky-header']) && $dimita_settings['enable-sticky-header'] ) ? ($dimita_settings['enable-sticky-header']) : false;
		$show_searchform = (isset($dimita_settings['show-searchform']) && $dimita_settings['show-searchform']) ? ($dimita_settings['show-searchform']) : false;
		$show_wishlist = (isset($dimita_settings['show-wishlist']) && $dimita_settings['show-wishlist']) ? ($dimita_settings['show-wishlist']) : false;
		$show_compare = (isset($dimita_settings['show-compare']) && $dimita_settings['show-compare']) ? ($dimita_settings['show-compare']) : false;
	?>
	<h1 class="bwp-title hide"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<header id='bwp-header' class="bwp-header header-v6">
		<?php if(isset($dimita_settings['show-header-top']) && $dimita_settings['show-header-top']){ ?>
		<div id="bwp-topbar" class="topbar-v1">
			<div class="topbar-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 topbar-left">
							<?php if( isset($dimita_settings['email']) && $dimita_settings['email'] ) : ?>
							<div class="email  hidden-xs">
								<label><?php echo esc_html__("Email:","dimita") ?></label> <a href="<?php echo esc_attr($dimita_settings['link-email']); ?>"><?php echo esc_html($dimita_settings['email']); ?></a>
							</div>
							<?php endif; ?>
							<?php if( isset($dimita_settings['sale']) && $dimita_settings['sale'] ) : ?>
							<div class="location hidden-sm hidden-xs">
								<label><?php echo esc_html__("Today’s Deal:","dimita") ?></label><?php echo esc_html($dimita_settings['sale']); ?>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 topbar-right">
							<?php if( isset($dimita_settings['location']) && $dimita_settings['location'] ) : ?>
								<div class="order hidden-sm hidden-xs">
									<a href="<?php echo esc_attr($dimita_settings['link-location']); ?>"><?php echo esc_html($dimita_settings['location']); ?></a>
								</div>
							<?php endif; ?>
							<?php if(is_active_sidebar('header-top-link-2')){ ?>
								<div class="block-top-link">					
									<?php dynamic_sidebar( 'header-top-link-2' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class='header-wrapper '>
			<div class='header-content' data-sticky_header="<?php echo esc_attr($enable_sticky_header); ?>">
				<?php if(($show_searchform || $show_minicart || $show_wishlist || (is_active_sidebar('top-link')) ) && class_exists( 'WooCommerce' )){ ?>
				<div class="header-top">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-logo">
								<?php dimita_header_logo(); ?>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 header-search-form hidden-sm hidden-xs">
								<!-- Begin Search -->
								<?php if($show_searchform && class_exists( 'WooCommerce' )){ ?>
									<?php get_template_part( 'search-form' ); ?>
								<?php } ?>
								<!-- End Search -->	
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-page-link">
								<?php if($show_searchform && class_exists( 'WooCommerce' )){ ?>
									<div class="search-box hidden-md hidden-lg">
										<div class="search-toggle"><i class="icon_search"></i></div>
									</div>
								<?php } ?>
								<?php if(is_active_sidebar('top-link')){ ?>
									<div class="block-top-link acount">
										<?php dynamic_sidebar( 'top-link' ); ?>
									</div>
								<?php } ?>
								<?php if($show_compare && class_exists( 'WPCleverWooscp' )){ ?>
								<div class="compare-box hidden-sm hidden-xs">        
									<a href="<?php echo WPCleverWooscp::wooscp_get_page_url(); ?>"><?php echo esc_html__('Compare', 'dimita')?></a>
								</div>
								<?php } ?>	
								<?php if($show_wishlist && class_exists( 'WPCleverWoosw' )){ ?>
								<div class="wishlist-box hidden-xs hidden-sm">
									<a href="<?php echo WPcleverWoosw::get_url(); ?>"><i class="icon-like"></i><?php echo esc_html__('My wishlist', 'dimita'); ?></a>
									<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
								</div>
								<?php } ?>
								<?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
								<div class="wpbingoCartTop">
									<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
								</div>
								<?php } ?>							
							</div>						
						</div>
					</div>
				</div>
				<div class="header-bottom">
					<div class="container">
						<div class="content-header">
							<?php $class_vertical = dimita_dropdown_vertical_menu(); ?>
							<div class="header-vertical-menu">
								<div class="categories-vertical-menu hidden-sm hidden-xs <?php echo esc_attr($class_vertical); ?>"
									data-textmore="<?php echo esc_html__("Other","dimita"); ?>" 
									data-textclose="<?php echo esc_html__("Close","dimita"); ?>" 
									data-max_number_1530="<?php echo esc_attr(dimita_limit_verticalmenu()->max_number_1530); ?>" 
									data-max_number_1200="<?php echo esc_attr(dimita_limit_verticalmenu()->max_number_1200); ?>" 
									data-max_number_991="<?php echo esc_attr(dimita_limit_verticalmenu()->max_number_991); ?>">
									<?php echo dimita_vertical_menu(); ?>
								</div>
								<div class="hidden-lg hidden-md pull-right">
									<?php dimita_navbar_vertical_menu(); ?>
								</div>	
							</div>
							<div class="wpbingo-menu-mobile header-main">
								<div class="content-main">
									<div class="header-menu-bg">
										<?php dimita_top_menu(); ?>
									</div>
									<?php if( isset($dimita_settings['shipping']) && $dimita_settings['shipping'] ) : ?>
										<div class="shipping hidden-md hidden-sm hidden-xs">
											<div class="text"><span><?php echo esc_html($dimita_settings['shipping']); ?></span></div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }else{ ?>
					<div class="header-default">
						<div class="container">
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6 header-logo">
									<?php dimita_header_logo(); ?>
								</div>
								<div class="col-md-10 col-sm-9 col-6 wpbingo-menu-mobile header-main">
									<div class="content-header">
										<div class="header-menu-bg">
											<?php dimita_top_menu(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div><!-- End header-wrapper -->		
	</header><!-- End #bwp-header -->