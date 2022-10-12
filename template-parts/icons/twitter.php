<?php
$has_account = isset( $extras['account'] );
$account = $has_account ? $extras['account'] : '';
?>
<?php if ( $has_account ) : ?>
<a href="https://twitter.com/{{ str_replace('@','',$attributes->get('account')) }}" target="_blank">
<?php endif; ?>
	<svg <?php echo $attributes; ?> focusable="false" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" aria-hidden="true">
		<path d="M11.92,24.94A12.76,12.76,0,0,0,24.76,12.1c0-.2,0-.39,0-.59A9.4,9.4,0,0,0,27,9.18a9.31,9.31,0,0,1-2.59.71,4.56,4.56,0,0,0,2-2.5,8.89,8.89,0,0,1-2.86,1.1,4.52,4.52,0,0,0-7.7,4.11,12.79,12.79,0,0,1-9.3-4.71,4.51,4.51,0,0,0,1.4,6,4.47,4.47,0,0,1-2-.56v.05A4.53,4.53,0,0,0,9.5,17.83a4.53,4.53,0,0,1-2,.08A4.51,4.51,0,0,0,11.68,21,9.05,9.05,0,0,1,6.07,23,9.77,9.77,0,0,1,5,22.91a12.77,12.77,0,0,0,6.92,2"></path>
	</svg>
<?php if ( $has_account ) : ?>
</a>
<a href="https://twitter.com/<?php echo str_replace( '@', '', $account ); ?>" target="_blank"><span class="hidden md:block"><?php echo $account; ?></span></a>
<?php endif; ?>
