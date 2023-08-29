<?php
/**
 * Template for displaying IDPay payment form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/idpay-payment/form.php.
 *
 * @author   IDPay
 * @package  LearnPress/IDPay/Templates
 * @version  1.1.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>

<?php $settings = LP()->settings; ?>

<p><?php echo $this->get_description(); ?></p>

<div id="learn-press-idpay-form" class="<?php if(is_rtl()) echo ' learn-press-form-idpay-rtl'; ?>">
    <p class="learn-press-form-row">
        <label><?php echo wp_kses( __( 'Email', 'learnpress-idpay' ), array( 'span' => array() ) ); ?></label>
        <input type="text" name="learn-press-idpay[email]" id="learn-press-idpay-payment-email"
               maxlength="30" value=""  placeholder="example@gmail.com"/>
		<div class="learn-press-idpay-form-clear"></div>
    </p>
	<div class="learn-press-idpay-form-clear"></div>
    <p class="learn-press-form-row">
        <label><?php echo wp_kses( __( 'Mobile', 'learnpress-idpay' ), array( 'span' => array() ) ); ?></label>
        <input type="text" name="learn-press-idpay[mobile]" id="learn-press-idpay-payment-mobile" value=""
               placeholder="09121234567"/>
		<div class="learn-press-idpay-form-clear"></div>
    </p>
	<div class="learn-press-idpay-form-clear"></div>
</div>
