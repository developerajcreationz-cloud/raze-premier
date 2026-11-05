<?php
/**
 * SEO, AEO and GEO explained with an interactive illustration.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_query = 'Who does dental implants near me with good reviews?';
$raze_modes = array(
	array(
		'key'   => 'seo',
		'label' => 'SEO',
		'name'  => 'Rank in the results',
		'body'  => 'Google still sends most of the traffic. We fix what stops your pages being crawled and understood, then build pages that match what people search for.',
	),
	array(
		'key'   => 'aeo',
		'label' => 'AEO',
		'name'  => 'Be the answer on top',
		'body'  => 'Answer engine optimisation. Clear, structured answers and schema markup so Google lifts your content into AI Overviews, snippets and voice results.',
	),
	array(
		'key'   => 'geo',
		'label' => 'GEO',
		'name'  => 'Get named by AI assistants',
		'body'  => 'Generative engine optimisation. ChatGPT, Perplexity and Gemini recommend businesses they can verify. We make your facts consistent and get you mentioned on the sites they read.',
	),
);
?>
<section class="ai-search" id="ai-search">
	<div class="ai-card">
		<div class="ai-grid">
			<div class="ai-copy">
				<p class="kicker kicker-light" data-reveal>SEO, AEO and GEO</p>
				<h2 class="h-xl" data-reveal style="--d:.06s">Search has three front pages now.</h2>
				<p class="lede" data-reveal style="--d:.12s">People still type into Google. More of them now read the AI summary at the top, or ask ChatGPT and never click. We work on all three, from one site and one set of facts about your business.</p>

				<div class="modes" role="tablist" aria-label="Search types" data-modes>
					<?php foreach ( $raze_modes as $raze_i => $raze_m ) : ?>
						<button class="mode<?php echo 0 === $raze_i ? ' is-on' : ''; ?>" type="button" role="tab" id="mode-<?php echo esc_attr( $raze_m['key'] ); ?>" aria-controls="demo-<?php echo esc_attr( $raze_m['key'] ); ?>" aria-selected="<?php echo 0 === $raze_i ? 'true' : 'false'; ?>" data-mode="<?php echo esc_attr( $raze_m['key'] ); ?>">
							<span class="mode-label mono"><?php echo esc_html( $raze_m['label'] ); ?></span>
							<span class="mode-text">
								<strong><?php echo esc_html( $raze_m['name'] ); ?></strong>
								<span><?php echo esc_html( $raze_m['body'] ); ?></span>
							</span>
							<span class="mode-progress" aria-hidden="true"></span>
						</button>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="demo" data-demo>
				<div class="demo-query">
					<span class="demo-q-icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="6"/><path d="m20 20-4.5-4.5"/></svg></span>
					<span class="demo-q-text" data-type="<?php echo esc_attr( $raze_query ); ?>"><?php echo esc_html( $raze_query ); ?></span>
				</div>

				<div class="demo-pane is-on" id="demo-seo" role="tabpanel" aria-labelledby="mode-seo">
					<ol class="serp">
						<li class="serp-row is-you"><span class="serp-url mono">yourpractice.co.uk</span><span class="serp-title">Dental implants from a specialist team, prices and reviews</span><span class="serp-meta">4.9 rating, 212 reviews. Free consultation.</span></li>
						<li class="serp-row"><span class="serp-url mono">directory-site.com</span><span class="serp-title">Top 10 implant dentists in your area</span><span class="serp-meta">Compare clinics and prices.</span></li>
						<li class="serp-row"><span class="serp-url mono">another-clinic.com</span><span class="serp-title">Implant treatment, book online</span><span class="serp-meta">Finance available.</span></li>
					</ol>
				</div>

				<div class="demo-pane" id="demo-aeo" role="tabpanel" aria-labelledby="mode-aeo" hidden>
					<div class="overview">
						<p class="overview-tag mono">AI Overview</p>
						<p class="overview-text">Implant clinics are usually judged on specialist training, aftercare and published prices. <mark>Your Practice lists all three on one page</mark>, with a free first consultation and 212 reviews averaging 4.9.</p>
						<p class="overview-src"><span class="chip">yourpractice.co.uk</span><span class="chip chip-dim">nhs.uk</span><span class="chip chip-dim">reviews site</span></p>
					</div>
				</div>

				<div class="demo-pane" id="demo-geo" role="tabpanel" aria-labelledby="mode-geo" hidden>
					<div class="chat">
						<p class="chat-user"><?php echo esc_html( $raze_query ); ?></p>
						<p class="chat-bot" data-stream>A good option nearby is <strong>Your Practice</strong>. They specialise in implants, publish their prices, and patients mention the aftercare in most reviews. You can book a free consultation on their site.</p>
						<p class="chat-src"><span class="chip">1 yourpractice.co.uk</span><span class="chip chip-dim">2 local news feature</span></p>
					</div>
				</div>

				<p class="demo-note">Illustration with a made-up clinic</p>
			</div>
		</div>
	</div>
</section>
