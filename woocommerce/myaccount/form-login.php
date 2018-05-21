<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="tour_login">

<?php endif; ?>


		<form class="woocommerce-form woocommerce-form-login login" method="post">
			<h4 class="register_heading">login</h4>
			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>
			<p class="register_or">or</p>
				<p class="register_social_heading">Register with social platforms</p>
				<div class="register_social_wrap">
					<a href=""><svg version="1.1" id="Facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"	 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<path fill="#2f80ed" d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M57,36.9c3.5,0,7.2-0.1,10.7,0.1
						c-0.1,3.7,0,7.6-0.1,11.3c-3.5,0-7.1,0-10.6,0c0,11.7,0,23.3,0,35c-5,0-10,0-15,0c0-11.7,0-23.3,0-35c-3.1-0.1-6.4,0-9.6-0.1
						c0-3.8,0-7.6,0-11.4c3.2,0,6.4,0,9.5,0c0.1-3,0-5.7,0.2-8.1s1-4.4,2.1-6.1c2.2-3.2,5.8-5.8,10.7-6c4-0.2,8.5,0.1,12.8,0.1
						c0,3.8,0.1,7.7-0.1,11.4c-2.1,0.1-4.3-0.2-6.1,0c-1.9,0.2-3.3,1.3-3.9,2.7C56.7,32.5,57,34.6,57,36.9z"/>
					</svg></a>

					<a href=""><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<g fill="#2f80ed">
						<path d="M36.5,56.8c-3.9,0.3-7.4,1.9-9.1,3.9c-0.8,0.9-1.7,2.7-1.7,4.3c0,1.3,0.4,2.4,0.8,3.3c1.5,2.7,5,4.4,8.7,4.6
							c5,0.3,10.4-2,12.1-5.9c0.6-1.4,0.7-3.5,0-5C45.8,58.6,41.3,56.4,36.5,56.8z"/>
						<path d="M40,28.5c-1.3-1.3-3.1-2.5-5.5-2.2c-3.9,0.5-5.8,4.9-5.1,9.7c0.5,3.3,2.9,7.2,5.7,8.5c1,0.4,2.4,0.7,3.6,0.4
							c3.2-0.8,4.9-4.7,4.5-8.7C43.1,33.4,41.7,30.2,40,28.5z"/>
						<path d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M47.1,26.9c0.9,0.6,1.9,1.7,2.4,2.8
							c0.7,1.8,0.7,3.8,0.7,5.8c0,5.1-2.8,7.3-5.5,9.7c-1.1,1-2.1,1.8-2.1,3c0,1.3,1.3,2.3,2.2,3.1c2.8,2.4,6,4.5,7.4,8.3
							c0.3,0.9,0.5,2.1,0.5,3.3c0,8.2-5.7,11.9-12.5,13.1c-8,1.4-16.2-0.2-19.3-5.3c-0.8-1.3-1.2-2.5-1.3-4.2c-0.6-9.5,9.2-11.8,18.3-12
							c-0.2-0.8-0.2-1.2-0.7-1.8c-0.4-0.5-1.1-0.7-1.3-1.3c-0.3-1,0.2-2.1,0-3.5c-8.7,0.4-13.7-4.4-13-12.5c0.6-7.6,6.5-11,14.1-11.8
							c4.5-0.5,10.3,0.2,15.6-0.1C52,26,47.7,24.8,45.9,26C46.3,26.6,46.7,26.7,47.1,26.9z M80.3,36.9c-3.4,0-6.8,0-10.3,0
							c0,3.3,0,7.2,0,10.2c-0.8,0.2-2.1,0-3.1,0.1c0-3.4,0-6.8,0-10.3c-3.4,0-6.8,0-10.3,0c0.1-1-0.1-2.2,0.1-3.1c3.4,0,6.8,0,10.2,0
							c0.1-3.4-0.1-7,0.1-10.3c1,0,1.9,0,2.9,0c0.2,3.2,0,6.9,0.1,10.3c3.4,0,6.8,0,10.2,0C80.4,34.7,80.3,35.9,80.3,36.9z"/>
					</g>
					</svg></a>

					<a href=""><svg version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
						<g fill="#2f80ed">
							<path d="M50.1,58.4c4.1,0,7.8-3.4,8-7.6c0.3-5.6-4.5-9.1-9.3-8.5c-3.5,0.5-6.1,2.9-6.8,6.4C40.9,54.2,45.6,58.4,50.1,58.4z"/>
							<path d="M71.3,26.6H65c-0.9,0-1.6,0.7-1.6,1.6v6.3c0,0.9,0.7,1.6,1.6,1.6h6.3c0.9,0,1.6-0.7,1.6-1.6v-6.3C73,27.3,72.2,26.6,71.3,26.6z"/>
							<path d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M78.1,65.2c0,3.8-0.7,6.7-2.7,9c-1.8,2-4.2,3.7-7.6,4
								c-5.6,0.4-11.6,0-17.6,0c-5.7,0-11.8,0.4-17.6,0c-5.7-0.4-10.1-4.6-10.5-10.5c-0.6-7.8,0.4-17,0-25.4c0-0.2,0.1-0.4,0.3-0.4	c5.3,0,10.5,0,15.8,0c0.5,0.3-0.4,1-0.7,1.5c-1.1,2-1.9,5-1.6,8.3c0.4,6.6,6,12.3,13.1,12.8c5.2,0.4,9.4-2.1,12-5.3	c2.4-2.9,4.4-8,2.6-13.4c-0.2-0.7-0.6-1.4-1-2c-0.3-0.6-0.8-1.2-0.8-1.9c5.4,0,10.7,0,16.1,0C78.2,50.1,78.1,57.6,78.1,65.2z	 M39,50.5c-0.1-3.6,1.6-6.5,3.3-8.2s3.8-2.8,7.1-3c6.1-0.4,11.1,3.9,11.7,9.5c0.6,6.2-3.7,11.7-9.3,12.4c-1,0.1-2.4,0.1-3.4,0C43.5,60.7,39.1,56.2,39,50.5z M78.1,40.3c-4.5,0-8.6,0-13.2,0c-1.4,0-3.1,0.3-4.4,0c-0.8-0.2-1.2-1-1.9-1.5c-2.2-1.6-5.6-3-9.8-2.7c-3.1,0.2-5.2,1.3-7.2,2.9c-0.5,0.4-1.3,1.2-1.9,1.4c-1.2,0.3-3,0-4.5,0c-4.3,0-8.5,0-13.1,0c0.2-3.3-0.4-6.5,0.1-9.3c0.6-3.3,2.6-5.6,4.6-7c0,3.9,0,11.7,0,11.7H29c0,0-0.2-9,0.1-13.1c0.3-0.3,1-0.2,1.4-0.5	c0.3,4.2,0.3,13.6,0.3,13.6H33c0,0,0-9,0-13.5c0-0.2,0-0.4,0.1-0.4c0.5,0,0.9,0,1.4,0c0,4.6,0,13.9,0,13.9h2.3c0,0,0-9.3,0-13.9c9.4,0.5,21.5-0.6,30.7,0c3.6,0.2,6.6,2,8.3,4.2C78.3,29.3,78.2,34,78.1,40.3z"/>
						</g>
						</svg></a>
					
				</div>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</p>
			<p class="link_to_register_block">
				Don’t have an account?
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="tour_register">

		<form method="post" class="register">
			<h4 class="register_heading">register</h4>

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<div>
					<p class="register_label_name">Confirm Password</p>
					<input class="register_input_field register_confirm_password" type="password" name="">
				</div>
				<script type="text/javascript">
					(function(){
						jQuery('.register_confirm_password').focus( function(){
						jQuery('body').keyup(function(){
							if(jQuery('input#reg_password[type="password"]').val() === jQuery('input.register_confirm_password[type="password"]').val()){
								jQuery('button.button[name="register"]').prop( "disabled", false );
								console.log("ok");
							} else {
								jQuery('button.button[name="register"]').prop( "disabled", true );
							}
						}) 
					});
					})();
				</script>
				<p class="register_or">or</p>
				<p class="register_social_heading">Register with social platforms</p>
				<div class="register_social_wrap">
					<a href=""><svg version="1.1" id="Facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"	 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<path fill="#2f80ed" d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M57,36.9c3.5,0,7.2-0.1,10.7,0.1
						c-0.1,3.7,0,7.6-0.1,11.3c-3.5,0-7.1,0-10.6,0c0,11.7,0,23.3,0,35c-5,0-10,0-15,0c0-11.7,0-23.3,0-35c-3.1-0.1-6.4,0-9.6-0.1
						c0-3.8,0-7.6,0-11.4c3.2,0,6.4,0,9.5,0c0.1-3,0-5.7,0.2-8.1s1-4.4,2.1-6.1c2.2-3.2,5.8-5.8,10.7-6c4-0.2,8.5,0.1,12.8,0.1
						c0,3.8,0.1,7.7-0.1,11.4c-2.1,0.1-4.3-0.2-6.1,0c-1.9,0.2-3.3,1.3-3.9,2.7C56.7,32.5,57,34.6,57,36.9z"/>
					</svg></a>

					<a href=""><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<g fill="#2f80ed">
						<path d="M36.5,56.8c-3.9,0.3-7.4,1.9-9.1,3.9c-0.8,0.9-1.7,2.7-1.7,4.3c0,1.3,0.4,2.4,0.8,3.3c1.5,2.7,5,4.4,8.7,4.6
							c5,0.3,10.4-2,12.1-5.9c0.6-1.4,0.7-3.5,0-5C45.8,58.6,41.3,56.4,36.5,56.8z"/>
						<path d="M40,28.5c-1.3-1.3-3.1-2.5-5.5-2.2c-3.9,0.5-5.8,4.9-5.1,9.7c0.5,3.3,2.9,7.2,5.7,8.5c1,0.4,2.4,0.7,3.6,0.4
							c3.2-0.8,4.9-4.7,4.5-8.7C43.1,33.4,41.7,30.2,40,28.5z"/>
						<path d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M47.1,26.9c0.9,0.6,1.9,1.7,2.4,2.8
							c0.7,1.8,0.7,3.8,0.7,5.8c0,5.1-2.8,7.3-5.5,9.7c-1.1,1-2.1,1.8-2.1,3c0,1.3,1.3,2.3,2.2,3.1c2.8,2.4,6,4.5,7.4,8.3
							c0.3,0.9,0.5,2.1,0.5,3.3c0,8.2-5.7,11.9-12.5,13.1c-8,1.4-16.2-0.2-19.3-5.3c-0.8-1.3-1.2-2.5-1.3-4.2c-0.6-9.5,9.2-11.8,18.3-12
							c-0.2-0.8-0.2-1.2-0.7-1.8c-0.4-0.5-1.1-0.7-1.3-1.3c-0.3-1,0.2-2.1,0-3.5c-8.7,0.4-13.7-4.4-13-12.5c0.6-7.6,6.5-11,14.1-11.8
							c4.5-0.5,10.3,0.2,15.6-0.1C52,26,47.7,24.8,45.9,26C46.3,26.6,46.7,26.7,47.1,26.9z M80.3,36.9c-3.4,0-6.8,0-10.3,0
							c0,3.3,0,7.2,0,10.2c-0.8,0.2-2.1,0-3.1,0.1c0-3.4,0-6.8,0-10.3c-3.4,0-6.8,0-10.3,0c0.1-1-0.1-2.2,0.1-3.1c3.4,0,6.8,0,10.2,0
							c0.1-3.4-0.1-7,0.1-10.3c1,0,1.9,0,2.9,0c0.2,3.2,0,6.9,0.1,10.3c3.4,0,6.8,0,10.2,0C80.4,34.7,80.3,35.9,80.3,36.9z"/>
					</g>
					</svg></a>

					<a href=""><svg version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
						<g fill="#2f80ed">
							<path d="M50.1,58.4c4.1,0,7.8-3.4,8-7.6c0.3-5.6-4.5-9.1-9.3-8.5c-3.5,0.5-6.1,2.9-6.8,6.4C40.9,54.2,45.6,58.4,50.1,58.4z"/>
							<path d="M71.3,26.6H65c-0.9,0-1.6,0.7-1.6,1.6v6.3c0,0.9,0.7,1.6,1.6,1.6h6.3c0.9,0,1.6-0.7,1.6-1.6v-6.3C73,27.3,72.2,26.6,71.3,26.6z"/>
							<path d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M78.1,65.2c0,3.8-0.7,6.7-2.7,9c-1.8,2-4.2,3.7-7.6,4
								c-5.6,0.4-11.6,0-17.6,0c-5.7,0-11.8,0.4-17.6,0c-5.7-0.4-10.1-4.6-10.5-10.5c-0.6-7.8,0.4-17,0-25.4c0-0.2,0.1-0.4,0.3-0.4	c5.3,0,10.5,0,15.8,0c0.5,0.3-0.4,1-0.7,1.5c-1.1,2-1.9,5-1.6,8.3c0.4,6.6,6,12.3,13.1,12.8c5.2,0.4,9.4-2.1,12-5.3	c2.4-2.9,4.4-8,2.6-13.4c-0.2-0.7-0.6-1.4-1-2c-0.3-0.6-0.8-1.2-0.8-1.9c5.4,0,10.7,0,16.1,0C78.2,50.1,78.1,57.6,78.1,65.2z	 M39,50.5c-0.1-3.6,1.6-6.5,3.3-8.2s3.8-2.8,7.1-3c6.1-0.4,11.1,3.9,11.7,9.5c0.6,6.2-3.7,11.7-9.3,12.4c-1,0.1-2.4,0.1-3.4,0C43.5,60.7,39.1,56.2,39,50.5z M78.1,40.3c-4.5,0-8.6,0-13.2,0c-1.4,0-3.1,0.3-4.4,0c-0.8-0.2-1.2-1-1.9-1.5c-2.2-1.6-5.6-3-9.8-2.7c-3.1,0.2-5.2,1.3-7.2,2.9c-0.5,0.4-1.3,1.2-1.9,1.4c-1.2,0.3-3,0-4.5,0c-4.3,0-8.5,0-13.1,0c0.2-3.3-0.4-6.5,0.1-9.3c0.6-3.3,2.6-5.6,4.6-7c0,3.9,0,11.7,0,11.7H29c0,0-0.2-9,0.1-13.1c0.3-0.3,1-0.2,1.4-0.5	c0.3,4.2,0.3,13.6,0.3,13.6H33c0,0,0-9,0-13.5c0-0.2,0-0.4,0.1-0.4c0.5,0,0.9,0,1.4,0c0,4.6,0,13.9,0,13.9h2.3c0,0,0-9.3,0-13.9c9.4,0.5,21.5-0.6,30.7,0c3.6,0.2,6.6,2,8.3,4.2C78.3,29.3,78.2,34,78.1,40.3z"/>
						</g>
						</svg></a>
					
				</div>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="register" disabled value="<?php esc_attr_e( 'Create Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create Account', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>
			<p class="register_bottom_login">Already have an account? <span class="register_show_login">Login</span></p>
		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
