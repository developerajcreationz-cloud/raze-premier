<?php
/**
 * Lander hero: centred headline with a rotating chip, an email field that
 * carries over to the audit form, three proof points and the headline stats.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_l    = $args['l'];
$raze_h    = $raze_l['hero'];
$raze_text = ! isset( raze_marks()[ $raze_h['chip'][0] ] );
?>
<section class="hero lhero" id="top">
	<div class="hero-bg" aria-hidden="true">
		<div class="hero-layer hero-layer-mid">
			<?php foreach ( $raze_h['floaters'] as $raze_i => $raze_f ) : ?>
				<?php if ( isset( $raze_f['m'] ) ) : ?>
					<span class="floater" style="--x:<?php echo (float) $raze_f['x']; ?>%;--y:<?php echo (float) $raze_f['y']; ?>%;--s:<?php echo (int) $raze_f['s']; ?>px;--i:<?php echo (int) $raze_i; ?>"><?php echo raze_mark( $raze_f['m'] ); // phpcs:ignore ?></span>
				<?php else : ?>
					<span class="floater floater-tag" style="--x:<?php echo (float) $raze_f['x']; ?>%;--y:<?php echo (float) $raze_f['y']; ?>%;--i:<?php echo (int) $raze_i; ?>"><?php echo raze_icon( $raze_f['i'] ); // phpcs:ignore ?><?php echo esc_html( $raze_f['t'] ); ?></span>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="hero-inner">
		<p class="hero-badge lhero-badge" data-hero-in style="--d:0s"><span class="dot" aria-hidden="true"></span><?php echo esc_html( $raze_h['badge'] ); ?></p>

		<h1 class="hero-title">
			<span class="hero-line" data-hero-in style="--d:.08s"><?php echo esc_html( $raze_h['lines'][0] ); ?></span>
			<span class="hero-line" data-hero-in style="--d:.16s"><?php echo esc_html( $raze_h['lines'][1] ); ?>
				<span class="surface<?php echo $raze_text ? ' surface-text' : ''; ?>" data-surface>
					<span class="surface-chip">
						<?php foreach ( $raze_h['chip'] as $raze_i => $raze_c ) : ?>
							<span class="surface-item<?php echo 0 === $raze_i ? ' is-on' : ''; ?>" data-surface-item>
								<?php if ( $raze_text ) : ?>
									<span class="surface-word"><i aria-hidden="true"></i><?php echo esc_html( $raze_c ); ?></span>
								<?php else : ?>
									<span class="surface-mark"><?php echo raze_mark( $raze_c ); // phpcs:ignore ?></span>
								<?php endif; ?>
							</span>
						<?php endforeach; ?>
					</span>
				</span>
			</span>
		</h1>

		<p class="hero-sub" data-hero-in style="--d:.28s"><?php echo esc_html( $raze_h['sub'] ); ?></p>

		<form class="lhero-form" data-hero-in style="--d:.38s" data-hero-form>
			<label class="sr-only" for="lh-email">Work email</label>
			<input id="lh-email" type="email" name="email" placeholder="Enter your work email" autocomplete="email" required>
			<button class="btn btn-grad" type="submit"><?php echo esc_html( $raze_h['button'] ); ?> <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></button>
		</form>

		<ul class="hero-points" data-hero-in style="--d:.46s">
			<?php foreach ( $raze_h['points'] as $raze_p ) : ?>
				<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_p ); ?></li>
			<?php endforeach; ?>
		</ul>

		<ul class="lhero-stats" data-hero-in style="--d:.56s">
			<?php foreach ( $raze_h['stats'] as $raze_s ) : ?>
				<li><b><?php echo esc_html( $raze_s['value'] ); ?></b><span><?php echo esc_html( $raze_s['label'] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
