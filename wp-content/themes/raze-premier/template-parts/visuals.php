<?php
/**
 * Small illustrations drawn in HTML and CSS for each service card.
 * Expects $args['type'].
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_type = isset( $args['type'] ) ? $args['type'] : '';

switch ( $raze_type ) {
	case 'brand':
		?>
		<div class="viz viz-brand" aria-hidden="true">
			<span class="vb-mark">R</span>
			<span class="vb-sw vb-sw-1"></span><span class="vb-sw vb-sw-2"></span><span class="vb-sw vb-sw-3"></span>
			<span class="vb-type">Aa</span>
		</div>
		<?php
		break;

	case 'web':
		?>
		<div class="viz viz-web" aria-hidden="true">
			<div class="vw-bar"><i></i><i></i><i></i><span></span></div>
			<div class="vw-body">
				<span class="vw-h"></span><span class="vw-l"></span><span class="vw-l vw-l-s"></span>
				<span class="vw-btn"></span>
				<span class="vw-score mono">98</span>
			</div>
		</div>
		<?php
		break;

	case 'video':
		?>
		<div class="viz viz-video" aria-hidden="true">
			<div class="vv-frame"><span class="vv-play"></span></div>
			<div class="vv-track"><i style="--w:28%"></i><i style="--w:18%"></i><i style="--w:34%"></i><i style="--w:14%"></i></div>
			<span class="vv-head"></span>
		</div>
		<?php
		break;

	case 'search':
		?>
		<div class="viz viz-search" aria-hidden="true">
			<div class="vs-q"><span></span></div>
			<div class="vs-row vs-you"><b class="mono">#1</b><span></span></div>
			<div class="vs-row"><b class="mono">#2</b><span></span></div>
			<div class="vs-ai"><span class="mono">AI</span><span class="vs-ai-l"></span></div>
		</div>
		<?php
		break;

	case 'gads':
		?>
		<div class="viz viz-gads" aria-hidden="true">
			<div class="vg-bars"><i style="--h:34%"></i><i style="--h:48%"></i><i style="--h:42%"></i><i style="--h:66%"></i><i style="--h:58%"></i><i style="--h:84%"></i></div>
			<span class="vg-tag mono">CPL &darr;</span>
		</div>
		<?php
		break;

	case 'meta':
		?>
		<div class="viz viz-meta" aria-hidden="true">
			<div class="vm-ad vm-a"><span></span><i></i></div>
			<div class="vm-ad vm-b"><span></span><i></i></div>
			<div class="vm-ad vm-c"><span></span><i></i></div>
		</div>
		<?php
		break;

	case 'funnel':
		?>
		<div class="viz viz-funnel" aria-hidden="true">
			<span class="vf-step" style="--w:100%">Ad click</span>
			<span class="vf-step" style="--w:82%">Landing page</span>
			<span class="vf-step" style="--w:64%">Form</span>
			<span class="vf-step" style="--w:46%">Follow-up</span>
			<span class="vf-step vf-win" style="--w:30%">Booked</span>
		</div>
		<?php
		break;
}
