<?php
/**
 * Template for displaying IDPay payment error message.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/idpay-payment/payment-error.php.
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

<div class="learn-press-message error ">
	<div><?php echo __( 'Transation failed', 'learnpress-idpay' ); ?></div>
</div>
