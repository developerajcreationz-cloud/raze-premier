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
						'icon'  => 'brand',
						'line'  => 'A look and a voice your team can use without us.',
						'desc'  => 'Positioning, name checks, logo system, colour and type, and a guideline your team can follow without us.',
						'tags'  => array( 'Logo system', 'Brand guidelines', 'Stationery', 'Social templates' ),
					),
					array(
						'name'  => 'Website development',
						'icon'  => 'web',
						'line'  => 'Fast on a phone, easy to edit, built for search.',
						'desc'  => 'WordPress, Shopify or custom builds. Fast on a phone, easy for you to edit, and set up for search from the first page.',
						'tags'  => array( 'WordPress', 'Shopify', 'Custom code', 'Speed and tracking' ),
					),
					array(
						'name'  => 'Video editing',
						'icon'  => 'video',
						'line'  => 'Edited for the first two seconds as much as the last.',
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
						'icon'  => 'search',
						'line'  => 'Rank in Google, get named by AI assistants.',
						'desc'  => 'Technical fixes, pages and content that rank in Google, get picked as the direct answer, and get named by AI assistants.',
						'tags'  => array( 'Technical SEO', 'Local SEO', 'Answer engines', 'AI search' ),
					),
					array(
						'name'  => 'Meta and Google Ads',
						'icon'  => 'ads',
						'line'  => 'Tested small, scaled on what books calls.',
						'desc'  => 'Search and Performance Max on Google, Facebook and Instagram on Meta. Creative made in-house, tested small before budget goes up, and tracked to the enquiry.',
						'tags'  => array( 'Google Search', 'Performance Max', 'Facebook', 'Instagram', 'Conversion tracking' ),
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
						'icon'  => 'funnel',
						'line'  => 'Every click followed up, every lead tagged.',
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
				'q' => 'Do I need all six services?',
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

/**
 * Service cards for the homepage grid: every service, in order.
 *
 * @return array
 */
function raze_service_cards() {
	$cards = array();
	foreach ( raze_service_groups() as $group ) {
		foreach ( $group['items'] as $item ) {
			$item['group'] = $group['id'];
			$cards[]       = $item;
		}
	}
	return apply_filters( 'raze_content_service_cards', $cards );
}

/**
 * Hero: the rotating place inside the headline, each with its brand mark.
 *
 * @return array mark slug => label
 */
function raze_hero_surfaces() {
	return apply_filters(
		'raze_content_hero_surfaces',
		array(
			'google'     => 'Google',
			'chatgpt'    => 'ChatGPT',
			'gemini'     => 'Gemini',
			'perplexity' => 'Perplexity',
			'instagram'  => 'Instagram',
			'maps'       => 'Maps',
			'claude'     => 'Claude',
			'youtube'    => 'YouTube',
		)
	);
}

/**
 * Hero background: marks floating in three depth layers.
 * x and y are percentages of the hero, s is the size in px.
 *
 * @return array
 */
function raze_hero_floaters() {
	return apply_filters(
		'raze_content_hero_floaters',
		array(
			'far'  => array(
				array( 'm' => 'youtube', 'x' => 8, 'y' => 18, 's' => 34 ),
				array( 'm' => 'tiktok', 'x' => 30, 'y' => 8, 's' => 30 ),
				array( 'm' => 'facebook', 'x' => 71, 'y' => 10, 's' => 30 ),
				array( 'm' => 'maps', 'x' => 93, 'y' => 30, 's' => 34 ),
				array( 'm' => 'meta', 'x' => 4, 'y' => 70, 's' => 32 ),
				array( 'm' => 'claude', 'x' => 95, 'y' => 82, 's' => 30 ),
			),
			'mid'  => array(
				array( 'm' => 'perplexity', 'x' => 17, 'y' => 34, 's' => 44 ),
				array( 'm' => 'instagram', 'x' => 83, 'y' => 22, 's' => 44 ),
				array( 'm' => 'gemini', 'x' => 12, 'y' => 84, 's' => 46 ),
				array( 'm' => 'youtube', 'x' => 76, 'y' => 88, 's' => 40 ),
			),
			'near' => array(
				array( 'm' => 'chatgpt', 'x' => 10, 'y' => 54, 's' => 58 ),
				array( 'm' => 'google', 'x' => 88, 'y' => 56, 's' => 58 ),
				array( 'm' => 'claude', 'x' => 26, 'y' => 90, 's' => 50 ),
				array( 'm' => 'meta', 'x' => 64, 'y' => 6, 's' => 48 ),
			),
		)
	);
}

/**
 * Lines for the statement above the services. The last word of each line
 * is set large, the way the reference site builds its values intro.
 *
 * @return array
 */
function raze_values_statement() {
	return apply_filters(
		'raze_content_values_statement',
		array(
			'lead'  => 'When we build for you, we build',
			'words' => array( 'clearly.', 'quickly.', 'measurably.' ),
			'motto' => array( 'Shipped', 'is better than perfect on paper.' ),
		)
	);
}

/**
 * How a project runs, drawn as a workflow. The first node is the trigger,
 * the last two run side by side.
 *
 * @return array
 */
function raze_workflow() {
	return apply_filters(
		'raze_content_workflow',
		array(
			array(
				'icon'  => 'bell',
				'tag'   => 'Trigger',
				'title' => 'You get in touch',
				'body'  => 'Book a call or send the form at the bottom of this page.',
			),
			array(
				'icon'  => 'search',
						'line'  => 'Rank in Google, get named by AI assistants.',
				'title' => 'A look under the hood',
				'body'  => 'We check your site, search, ads and tracking first.',
			),
			array(
				'icon'  => 'doc',
				'title' => 'Written plan, fixed quote',
				'body'  => 'What we would do first, what it costs, what to expect.',
			),
			array(
				'icon'  => 'rocket',
				'title' => 'Build and launch',
				'body'  => 'Brand, site, campaigns and funnel go live together.',
			),
			array(
				'icon'  => 'chart',
				'title' => 'Track and report',
				'body'  => 'Leads and cost per lead each month, then the next move.',
			),
		)
	);
}

/**
 * Results row. Every figure here is a fact about how we work, not a client
 * result. Replace with real client numbers once you have permission to use them.
 *
 * @return array
 */
function raze_results_stats() {
	return apply_filters(
		'raze_content_results_stats',
		array(
			array( 'value' => (string) count( raze_service_cards() ), 'label' => 'services under one roof' ),
			array( 'value' => '4', 'label' => 'steps from first call to launch' ),
			array( 'value' => '1', 'label' => 'report a month, in plain numbers' ),
			array( 'value' => '0', 'label' => 'accounts kept in our name' ),
		)
	);
}

/**
 * Wall of love.
 *
 * The cards marked 'sample' are placeholders that show the layout. They are
 * labelled "Sample" on the page. Replace each one with a real review (and set
 * 'sample' to false) or delete it. Never publish a made-up review as real.
 *
 * Wrap words in [[double brackets]] to highlight them.
 *
 * @return array
 */
function raze_reviews() {
	return apply_filters(
		'raze_content_reviews',
		array(
			array(
				'sample' => false,
				'source' => 'Framily Adventures',
				'title'  => 'A brand built around the people',
				'body'   => 'Travel isn’t just about the places you go, [[it’s about the people you meet along the way.]]',
				'name'   => 'Derachio Jackson',
				'role'   => 'Creative Director, Framily Adventures',
			),
			array(
				'sample' => true,
				'title'  => 'Finally one team for the site and the ads',
				'body'   => 'Before, the designer, the developer and the ads person never spoke. Now [[the site, the campaigns and the tracking are set up together]], and I get one report that makes sense.',
				'name'   => 'Client name',
				'role'   => 'Role, company',
			),
			array(
				'sample' => true,
				'title'  => 'We show up in AI answers now',
				'body'   => 'We asked ChatGPT and Perplexity about our category and never came up. After the content and listings work, [[we are named in the answers for our main services.]]',
				'name'   => 'Client name',
				'role'   => 'Role, company',
			),
			array(
				'sample' => true,
				'title'  => 'Every lead has a source',
				'body'   => 'The funnel tags each enquiry with the campaign that brought it in. [[For the first time I know which ads actually book calls]], not just which ones get clicks.',
				'name'   => 'Client name',
				'role'   => 'Role, company',
			),
			array(
				'sample' => true,
				'title'  => 'The brand finally looks like us',
				'body'   => 'The guideline is short and clear. [[Our team makes posts that look on brand without asking anyone]], which was the whole point.',
				'name'   => 'Client name',
				'role'   => 'Role, company',
			),
			array(
				'sample' => true,
				'title'  => 'Reels that hold the first two seconds',
				'body'   => 'The edits are tight and the captions are clean. [[People watch to the end now]], and the same cuts work as ads.',
				'name'   => 'Client name',
				'role'   => 'Role, company',
			),
		)
	);
}
