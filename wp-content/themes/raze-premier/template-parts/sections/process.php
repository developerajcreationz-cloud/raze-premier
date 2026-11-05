<?php
/**
 * How a project runs.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="process" id="process">
	<div class="wrap section-head">
		<p class="kicker" data-reveal>Process</p>
		<h2 class="h-xl" data-reveal style="--d:.06s">How a project runs.</h2>
	</div>
	<div class="wrap">
		<ol class="steps" data-steps>
			<span class="steps-line" aria-hidden="true"><span class="steps-fill" data-steps-fill></span></span>
			<?php foreach ( raze_process() as $raze_i => $raze_step ) : ?>
				<li class="step" data-reveal style="--d:<?php echo esc_attr( $raze_i * 0.08 ); ?>s">
					<span class="step-n mono"><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span>
					<h3 class="step-title"><?php echo esc_html( $raze_step['title'] ); ?></h3>
					<p class="step-body"><?php echo esc_html( $raze_step['body'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
