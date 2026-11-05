<?php
/**
 * Landing page content.
 *
 * Copy lives here, in one place, so it can be edited without touching
 * markup. Each function is filterable (raze_content_{name}) so a child
 * theme or plugin can change it too.
 *
 * Writing rules for this file: sentence case, plain words, no em dashes,
 * no invented numbers or testimonials.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * Words that rotate inside the hero headline.
 *
 * @return string[]
 */
function raze_hero_places() {
	return apply_filters(
		'raze_content_hero_places',
		array( 'on Google', 'in ChatGPT', 'on Maps', 'on Instagram', 'in Perplexity', 'on YouTube' )
	);
}

/**
 * Places customers search, shown in the scrolling strip.
 *
 * @return string[]
 */
function raze_search_surfaces() {
	return apply_filters(
		'raze_content_search_surfaces',
		array( 'Google Search', 'Google Maps', 'ChatGPT', 'Perplexity', 'Gemini', 'AI Overviews', 'Instagram', 'Facebook', 'YouTube', 'Bing' )
	);
}

/**
 * Services, grouped by the outcome the client is buying.
 *
 * @return array
 */
function raze_service_groups() {
	return apply_filters(
		'raze_content_service_groups',
		array(
			array(
				'id'      => 'credible',
				'index'   => '01',
				'title'   => 'Look like the business you already are',
				'intro'   => 'Most people check you out before they get in touch. The brand, the site and the video decide whether they do.',
				'tone'    => 'paper',
				'items'   => array(
					array(
						'name'  => 'Branding',
						'desc'  => 'Positioning, name checks, logo system, colour and type, and a guideline your team can follow without us.',
						'tags'  => array( 'Logo system', 'Brand guidelines', 'Stationery', 'Social templates' ),
					),
					array(
						'name'  => 'Website development',
						'desc'  => 'WordPress, Shopify or custom builds. Fast on a phone, easy for you to edit, and set up for search from the first page.',
						'tags'  => array( 'WordPress', 'Shopify', 'Custom code', 'Speed and tracking' ),
					),
					array(
						'name'  => 'Video editing',
						'desc'  => 'Reels, shorts, ad cuts and longer brand films, edited for the first two seconds as much as the last.',
						'tags'  => array( 'Reels and shorts', 'Ad creative', 'Captions', 'Brand films' ),
					),
				),
			),
			array(
				'id'      => 'found',
				'index'   => '02',
				'title'   => 'Get found where people actually look',
				'intro'   => 'Search is no longer one results page. People ask Google, Maps and AI assistants, and scroll feeds. We cover each one.',
				'tone'    => 'ink',
				'items'   => array(
					array(
						'name'  => 'SEO, AEO and GEO',
						'desc'  => 'Technical fixes, pages and content that rank in Google, get picked as the direct answer, and get named by AI assistants.',
						'tags'  => array( 'Technical SEO', 'Local SEO', 'Answer engines', 'AI search' ),
					),
					array(
						'name'  => 'Google Ads',
						'desc'  => 'Search, Performance Max and local campaigns, built around the searches that turn into enquiries, not the cheap clicks.',
						'tags'  => array( 'Search', 'Performance Max', 'Conversion tracking' ),
					),
					array(
						'name'  => 'Meta Ads',
						'desc'  => 'Facebook and Instagram campaigns with creative we make in-house, tested in small batches before budget goes up.',
						'tags'  => array( 'Facebook', 'Instagram', 'Creative testing', 'Pixel and CAPI' ),
					),
				),
			),
			array(
				'id'      => 'convert',
				'index'   => '03',
				'title'   => 'Turn the interest into booked calls',
				'intro'   => 'Traffic is only useful if someone follows up. This is the part most agencies leave to you.',
				'tone'    => 'signal',
				'items'   => array(
					array(
						'name'  => 'Lead funnels',
						'desc'  => 'Landing pages, forms, booking and automatic follow-up by email, SMS or WhatsApp, with every lead tagged by the campaign that brought it in.',
						'tags'  => array( 'Landing pages', 'Booking', 'Follow-up automation', 'CRM pipeline' ),
					),
				),
			),
		)
	);
}

/**
 * Selected work.
 *
 * @return array
 */
function raze_work() {
	return apply_filters(
		'raze_content_work',
		array(
			array(
				'client'   => 'Framily Adventures',
				'kind'     => 'Brand identity, app and web design',
				'summary'  => 'A travel community for people who go alone and want to come back with friends. We built the identity around four ideas, community, discovery, connection and growth, then designed the app and website for phone, tablet and desktop.',
				'delivered'=> array( 'Identity system', 'App and web UI', 'Motion', 'Front and back end' ),
				'images'   => array(
					array( 'src' => 'img/work/framily-adventures-04-brand-system-overview.webp', 'alt' => 'Framily Adventures identity across a bus wrap, bags, a t-shirt and cups in green and burnt orange.' ),
					array( 'src' => 'img/work/framily-adventures-07-app-and-web-screens.webp', 'alt' => 'Framily Adventures app and website screens on phone, tablet and laptop.' ),
					array( 'src' => 'img/work/framily-adventures-06-outdoor-billboard.webp', 'alt' => 'Framily Adventures outdoor billboard.' ),
				),
			),
			array(
				'client'   => 'Call Time Studio',
				'kind'     => 'Brand identity',
				'summary'  => 'A studio for new filmmakers that wanted to sound clear and professional without losing energy. A pink, orange and yellow gradient on black, carried from business cards to LED screens.',
				'delivered'=> array( 'Identity', 'Stationery', 'Merchandise', 'Social and outdoor' ),
				'images'   => array(
					array( 'src' => 'img/work/call-time-01-youtube-channel-banner.webp', 'alt' => 'Call Time Studio channel banner with a filmmaker silhouette and the Call Time wordmark.' ),
					array( 'src' => 'img/work/call-time-03-poster-series.webp', 'alt' => 'Call Time Studio poster series.' ),
					array( 'src' => 'img/work/call-time-05-stationery.webp', 'alt' => 'Call Time Studio letterhead and folders.' ),
				),
			),
			array(
				'client'   => 'NayaSource',
				'kind'     => 'B2B brand and UI/UX',
				'summary'  => 'A sourcing platform that links buyers with overseas suppliers. The brand had to feel trustworthy to procurement teams and still warm. We made the identity, the web and app interface, and the print pieces.',
				'delivered'=> array( 'Logo and identity', 'Web and app UI', 'Social posts', 'Print and packaging' ),
				'images'   => array(
					array( 'src' => 'img/work/nayasource-01-instagram-posts.webp', 'alt' => 'Three NayaSource Instagram posts using the purple to orange gradient.' ),
					array( 'src' => 'img/work/nayasource-03-business-cards.webp', 'alt' => 'NayaSource business cards in light and dark versions.' ),
					array( 'src' => 'img/work/nayasource-02-tote-bag.webp', 'alt' => 'NayaSource branded tote bag.' ),
				),
			),
		)
	);
}

/**
 * How a project runs.
 *
 * @return array
 */
function raze_process() {
	return apply_filters(
		'raze_content_process',
		array(
			array(
				'title' => 'A call and a look under the hood',
				'body'  => 'We talk through what you sell and who buys it, then check your site, search presence, ad accounts and tracking before we suggest anything.',
			),
			array(
				'title' => 'A written plan with a fixed quote',
				'body'  => 'You get what we would do first, what it costs and what you should expect to see. If one service is enough, we say so.',
			),
			array(
				'title' => 'Build, launch, and connect the tracking',
				'body'  => 'Brand, site, campaigns and funnel go live together, so every enquiry is tied to the source that produced it from day one.',
			),
			array(
				'title' => 'Monthly numbers, then the next move',
				'body'  => 'A short report on leads, cost per lead and where they came from, and a call about what to change next month.',
			),
		)
	);
}

/**
 * Frequently asked questions. Also printed as FAQPage schema.
 *
 * @return array
 */
function raze_faqs() {
	return apply_filters(
		'raze_content_faqs',
		array(
			array(
				'q' => 'What are AEO and GEO, and how are they different from SEO?',
				'a' => 'SEO gets your pages ranked in Google results. AEO (answer engine optimisation) gets your content chosen as the direct answer, in featured snippets, voice search and Google AI Overviews. GEO (generative engine optimisation) gets your business named and linked when people ask ChatGPT, Perplexity or Gemini. They share the same base: a fast, well-structured site with clear facts about what you do, plus mentions of you on other trusted sites.',
			),
			array(
				'q' => 'Do I need all seven services?',
				'a' => 'No. Plenty of clients start with one, usually a website or ads. We suggest adding others only when the numbers show where the gap is.',
			),
			array(
				'q' => 'How long before SEO shows results?',
				'a' => 'Technical fixes and local listings can move within weeks. Content and authority usually take three to six months to show in rankings and AI answers. Ads are the faster lever while that builds.',
			),
			array(
				'q' => 'How do you price projects?',
				'a' => 'Branding and websites are quoted as fixed projects. SEO, ads management and funnels are monthly. You get the full quote in writing after the first call, before any work starts.',
			),
			array(
				'q' => 'Will I own the website, ad accounts and content?',
				'a' => 'Yes. Domains, hosting, ad accounts, analytics and design files are set up in your name, and we work inside them with access you can remove at any time.',
			),
			array(
				'q' => 'Do you work with businesses in other countries?',
				'a' => 'Yes. We work remotely and plan calls around your time zone.',
			),
		)
	);
}

/**
 * Service options for the contact form, flattened from the groups.
 *
 * @return string[]
 */
function raze_service_options() {
	$options = array();
	foreach ( raze_service_groups() as $group ) {
		foreach ( $group['items'] as $item ) {
			$options[] = $item['name'];
		}
	}
	$options[] = 'Not sure yet';
	return $options;
}
