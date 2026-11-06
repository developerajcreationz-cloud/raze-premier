<?php
/**
 * Service landers: focused pages for one offer each, built from the content
 * below and the parts in template-parts/lander.
 *
 * A lander links only to itself and to the other lander, never back to the
 * homepage, so paid and organic visitors stay on the offer. The homepage can
 * link to the landers.
 *
 * Each lander is a WordPress page using the matching page template
 * (Page Attributes > Template). If no page uses the template yet, links fall
 * back to the default slug.
 *
 * Writing rules: sentence case, plain words, no em dashes. Figures are the
 * real Search Console results behind the screenshots in assets/img/results.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * All landers, keyed by id.
 *
 * @return array
 */
function raze_landers() {
	$landers = array(
		'seo' => array(
			'name'     => 'SEO, AEO and GEO',
			'slug'     => 'seo-aeo-geo',
			'template' => 'templates/lander-seo.php',
			'title'    => 'SEO, AEO and GEO services: get found on Google and in AI answers',
			'desc'     => 'Raze Premier grows organic traffic on Google and gets your brand named in ChatGPT, Gemini, Perplexity and Google AI Overviews. SEO, AEO and GEO with results you can check in your own Search Console.',
			'nav'      => array(
				'#services' => 'Services',
				'#results'  => 'Results',
				'#process'  => 'Process',
				'#faq'      => 'FAQ',
			),
			'cta'      => 'Free audit',
			'footer'   => 'SEO · AEO · GEO',

			'hero'     => array(
				'badge'   => 'Free SEO and AI visibility audit',
				'lines'   => array( 'Be the answer on Google', 'and in AI search' ),
				'chip'    => array( 'google', 'chatgpt', 'gemini', 'perplexity', 'claude' ),
				'sub'     => 'We combine SEO, AEO and GEO to grow your rankings, win the featured answer and get your brand named by ChatGPT, Gemini and Perplexity. Every result is checked in your own Search Console.',
				'button'  => 'Get my free audit',
				'points'  => array( 'Reply within one business day', 'No lock-in', 'Reported from your own Search Console' ),
				'stats'   => array(
					array( 'value' => '+144%', 'label' => 'Best click growth in 6 months' ),
					array( 'value' => '+247%', 'label' => 'Best impression growth' ),
					array( 'value' => '311k', 'label' => 'Google AI impressions on one project' ),
				),
				'floaters' => array(
					array( 'm' => 'google', 'x' => 9, 'y' => 30, 's' => 50 ),
					array( 'm' => 'chatgpt', 'x' => 88, 'y' => 26, 's' => 52 ),
					array( 'm' => 'gemini', 'x' => 14, 'y' => 74, 's' => 42 ),
					array( 'm' => 'perplexity', 'x' => 84, 'y' => 72, 's' => 44 ),
					array( 'm' => 'claude', 'x' => 27, 'y' => 12, 's' => 34 ),
					array( 'm' => 'maps', 'x' => 72, 'y' => 10, 's' => 32 ),
				),
			),

			'statement' => 'Buyers no longer stop at the first page of Google. They ask AI Overviews, ChatGPT and Perplexity, and take the answer they are given. We make sure that [[your brand is the answer]], on Google and in every assistant your buyers use.',

			'layers'   => array(
				'title' => 'Three layers of search, one strategy',
				'sub'   => 'Search now happens on Google, in answer boxes and inside AI assistants. Winning one and missing the others leaves buyers on the table, so we build all three together.',
				'items' => array(
					array(
						'name'   => 'SEO',
						'full'   => 'Search engine optimisation',
						'body'   => 'The foundation. We fix what blocks growth, then build topical authority so Google trusts and ranks you for the searches that bring buyers.',
						'ticks'  => array( 'Technical audit, crawl and Core Web Vitals', 'Keyword and intent mapping to revenue pages', 'Pillar and cluster content that builds authority', 'Internal linking and ethical link building' ),
						'where'  => array( 'Google Search', 'Google Maps', 'Bing' ),
					),
					array(
						'name'   => 'AEO',
						'full'   => 'Answer engine optimisation',
						'body'   => 'Featured snippets, People Also Ask, voice assistants and AI answers all pull one clear answer. We structure your content so yours is the one they lift.',
						'ticks'  => array( 'Question research from real buyer searches', 'Answer-first formatting and clear definitions', 'FAQ, HowTo and Article schema', 'Snippet and People Also Ask targeting' ),
						'where'  => array( 'Featured snippets', 'People Also Ask', 'Voice search' ),
					),
					array(
						'name'   => 'GEO',
						'full'   => 'Generative engine optimisation',
						'body'   => 'AI models recommend brands they recognise and trust. We build your entity, authority and citations so you are named when buyers ask AI for the best option.',
						'ticks'  => array( 'AI visibility baseline across the main assistants', 'Entity and brand consistency across the web', 'Citable facts, original data and expert content', 'Third-party mentions and digital PR' ),
						'where'  => array( 'ChatGPT', 'Gemini', 'Perplexity', 'AI Overviews' ),
					),
				),
			),

			'results'  => array(
				'title'   => array( 'Real results,', 'straight from Search Console' ),
				'sub'     => 'Straight from Google Search Console: the last six months compared with the six before. Pick a project, switch the view, and open any screenshot full size.',
				'summary' => array(
					array( 'value' => '+144%', 'label' => 'Best click growth' ),
					array( 'value' => '+247%', 'label' => 'Best impression growth' ),
					array( 'value' => '359k', 'label' => 'Google AI impressions across 3 projects' ),
					array( 'value' => '3/3', 'label' => 'Projects now shown in Google AI' ),
				),
				'projects' => array(
					array(
						'name'  => 'Project A',
						'big'   => '+119%',
						'small' => 'clicks, and 311k Google AI impressions from zero',
						'tab'   => '+119% clicks, 311k AI impressions',
						'title' => 'Doubled organic traffic and became a source for Google AI',
						'kpis'  => array(
							array( 'label' => 'Clicks', 'change' => '+119%', 'before' => '5.11k', 'now' => '11.2k', 'w' => 46 ),
							array( 'label' => 'Impressions', 'change' => '+122%', 'before' => '134k', 'now' => '297k', 'w' => 45 ),
							array( 'label' => 'Average position', 'change' => 'Up 4.4 places', 'before' => '18.3', 'now' => '13.9', 'w' => 100, 'wnow' => 76 ),
							array( 'label' => 'Google AI impressions', 'change' => 'New', 'before' => '0', 'now' => '311k', 'w' => 0 ),
						),
						'shots' => array(
							array( 'label' => 'Search performance', 'src' => 'img/results/project-a-search.webp', 'alt' => 'Search Console performance: 11.2k clicks and 297k impressions in the last 6 months, up from 5.11k and 134k.' ),
							array( 'label' => 'Google AI impressions', 'src' => 'img/results/project-a-ai-impressions.webp', 'alt' => 'Search Console generative AI report showing 311k impressions, up from 0.' ),
						),
					),
					array(
						'name'  => 'Project B',
						'big'   => '+247%',
						'small' => 'impressions, and 2.4 times the clicks',
						'tab'   => '+144% clicks, +247% impressions',
						'title' => '2.4 times the clicks and 3.5 times the impressions',
						'kpis'  => array(
							array( 'label' => 'Clicks', 'change' => '+144%', 'before' => '1.73k', 'now' => '4.22k', 'w' => 41 ),
							array( 'label' => 'Impressions', 'change' => '+247%', 'before' => '59.3k', 'now' => '206k', 'w' => 29 ),
							array( 'label' => 'Average position', 'change' => 'Up 0.5 places', 'before' => '11.2', 'now' => '10.7', 'w' => 100, 'wnow' => 96 ),
							array( 'label' => 'Google AI impressions', 'change' => 'New', 'before' => '0', 'now' => '27.5k', 'w' => 0 ),
						),
						'shots' => array(
							array( 'label' => 'Search performance', 'src' => 'img/results/project-b-search.webp', 'alt' => 'Search Console performance: 4.22k clicks and 206k impressions, up from 1.73k and 59.3k.' ),
							array( 'label' => 'Google AI impressions', 'src' => 'img/results/project-b-ai-impressions.webp', 'alt' => 'Search Console generative AI report showing 27.5k impressions, up from 0.' ),
						),
					),
					array(
						'name'  => 'Project C',
						'big'   => '20.5k',
						'small' => 'Google AI impressions, up from zero',
						'tab'   => '0 to 20.5k AI impressions',
						'title' => 'From zero to 20.5k AI impressions',
						'kpis'  => array(
							array( 'label' => 'Google AI impressions', 'change' => 'New', 'before' => '0', 'now' => '20.5k', 'w' => 0 ),
						),
						'note'  => 'Impressions climbed steadily across the full six months, with no drop after the first citations.',
						'shots' => array(
							array( 'label' => 'Google AI impressions', 'src' => 'img/results/project-c-ai-impressions.webp', 'alt' => 'Search Console generative AI report showing 20.5k impressions, up from 0.' ),
						),
					),
				),
				'note'    => 'Results are client-specific and depend on market, competition and starting point. Past results do not guarantee future ones.',
			),

			'process'  => array(
				'style' => 'flow',
				'kicker' => 'How a project runs',
				'body'  => 'Every engagement starts with a free audit, so you see the plan and the gaps before you pay for anything. Then the work ships every month and is reported from your own Search Console.',
				'title' => 'A clear path from audit to authority',
				'steps' => array(
					array( 'Audit and baseline', 'Technical, content and AI visibility audit to find the fastest wins and the biggest gaps.' ),
					array( 'Strategy and roadmap', 'A keyword, question and entity map, ordered by revenue impact and effort.' ),
					array( 'Build and optimise', 'Fixes, content, schema and authority work shipped every month.' ),
					array( 'Measure and scale', 'Track clicks, rankings and AI citations, then do more of what works.' ),
				),
			),

			'why'      => array(
				'title'   => 'Built for how people search today',
				'items'   => array(
					array( 'chart', 'Evidence-led', 'Every recommendation is tied to your own Search Console and analytics, and reported back the same way.' ),
					array( 'brand', 'Ready for AI answers', 'Schema, answer-first content and entity signals go into every page from the start.' ),
					array( 'funnel', 'Revenue first', 'We chase qualified traffic and leads, not vanity rankings. Priorities follow commercial impact.' ),
					array( 'doc', 'Open reporting', 'A monthly report in plain words and a shared roadmap. No black boxes, no lock-in.' ),
					array( 'check', 'Within Google’s rules', 'Tactics that follow Google’s guidelines and hold up through algorithm updates.' ),
					array( 'search', 'Senior people on your account', 'Strategists, technical SEOs and writers work with you directly.' ),
				),
				'compare' => array(
					'head' => array( 'SEO only', 'SEO, AEO and GEO with us' ),
					'rows' => array(
						array( 'Visibility', 'Blue links on Google', 'Google, featured answers and AI assistants' ),
						array( 'Content', 'Keywords and word counts', 'Answer-first pages built to be cited' ),
						array( 'Authority', 'Backlinks', 'Entity, schema and third-party mentions' ),
						array( 'Measurement', 'Rankings report', 'Clicks, impressions and AI impressions in Search Console' ),
						array( 'Reporting', 'Monthly PDF', 'A roadmap you can see and question' ),
					),
				),
			),

			'bridge'   => array(
				'to'    => 'ghl',
				'marks' => array( 'google', 'chatgpt', 'gemini' ),
				'title' => 'Rankings bring visitors. Follow-up turns them into customers.',
				'sub'   => 'SEO and AI visibility fill the top of your funnel, but most enquiries go cold if nobody replies fast. We connect your organic leads to a GoHighLevel pipeline, so everyone who gets in touch gets an instant reply, timed follow-up and a booking link.',
				'flow'  => array(
					array( 'Search and AI answers', 'Google, AI Overviews, ChatGPT, Gemini' ),
					array( 'Your landing page', 'Fast, answer-first, built to convert' ),
					array( 'Lead captured', 'Form, call or chat, saved with source and keyword' ),
					array( 'GoHighLevel follow-up', 'Instant SMS and email, AI assistant, reminders' ),
					array( 'Booked and won', 'Pipeline, reviews and revenue reported back' ),
				),
				'why'   => array(
					array( 'The fastest reply wins', 'The first business to answer usually gets the job. Automation answers in seconds, day or night.' ),
					array( 'No organic lead left behind', 'Forms, calls, chats and missed calls land in one pipeline with automatic follow-up.' ),
					array( 'See which SEO work earns revenue', 'Source and keyword are tracked from first click to closed deal.' ),
					array( 'Catch high-intent AI visitors', 'People arriving from AI answers are ready to act. Follow up while the intent is hot.' ),
				),
				'cta'   => 'See GoHighLevel automation',
			),

			'faq'      => array(
				'title' => 'Everything you’re wondering',
				'items' => array(
					array( 'What is the difference between SEO, AEO and GEO?', 'SEO earns rankings and clicks in normal search results. AEO structures content so featured snippets, voice assistants and search features can lift a direct answer from it. GEO builds the entity authority and citations that make ChatGPT, Gemini, Perplexity and Google AI Overviews mention and recommend your brand.' ),
					array( 'How long do results take?', 'Most projects see measurable movement in impressions and rankings within 60 to 90 days, with clicks and leads compounding across months four to six. Timelines depend on competition, site health and how much content goes out.' ),
					array( 'Can you prove results?', 'Yes. Every engagement is reported from your own Google Search Console and analytics. Our case studies compare the last six months with the six before, including impressions from Google’s generative AI features.' ),
					array( 'Do I need AEO and GEO if my SEO is already good?', 'Strong SEO is the base, but AI answers choose sources differently from blue-link rankings. AEO and GEO add structured answers, schema, consistent entity data and third-party citations, so you show up where buyers now ask.' ),
					array( 'Can you follow up the leads that SEO brings in?', 'Yes. We connect your forms, calls and chat to a GoHighLevel CRM, so every organic lead gets an instant reply, automated follow-up and a booking link.' ),
					array( 'Which industries do you work with?', 'B2B SaaS, ecommerce, local and service businesses, healthcare and professional services. Every plan is built around your market and your buyers’ questions.' ),
					array( 'What does it cost?', 'Each engagement is scoped to your goals and competition. Start with the free audit and we will recommend a plan with a fixed monthly fee.' ),
				),
			),

			'form'     => array(
				'title'   => 'Get your free SEO and AI visibility audit',
				'sub'     => 'We will show you where you rank today, where competitors are named by AI, and the quickest way to close the gap.',
				'ticks'   => array( 'Technical and content health check', 'AI answer visibility snapshot', 'A 90-day action plan in priority order' ),
				'label'   => 'What do you need?',
				'options' => array( 'SEO, AEO and GEO (recommended)', 'SEO', 'AEO', 'GEO', 'Not sure yet' ),
				'button'  => 'Request my free audit',
				'fine'    => array( 'Takes 30 seconds', 'No lock-in', 'We never share your details' ),
			),
		),

		'ghl' => array(
			'name'     => 'GoHighLevel automation',
			'slug'     => 'gohighlevel-automation',
			'template' => 'templates/lander-ghl.php',
			'title'    => 'GoHighLevel setup, CRM and automation services',
			'desc'     => 'Done-for-you GoHighLevel: CRM and pipelines, funnels, SMS and email automation, AI chat and voice AI. Capture every lead, follow up in seconds and book more appointments.',
			'nav'      => array(
				'#services' => 'Services',
				'#use-cases' => 'Use cases',
				'#process'  => 'Process',
				'#faq'      => 'FAQ',
			),
			'cta'      => 'Free audit',
			'footer'   => 'GoHighLevel · CRM · Automation',

			'hero'     => array(
				'badge'   => 'GoHighLevel setup, CRM and automation',
				'lines'   => array( 'Turn every lead into', 'a booked customer' ),
				'chip'    => array( 'New lead', 'SMS sent', 'Booked', 'Review in' ),
				'sub'     => 'We build your GoHighLevel system end to end: CRM, funnels, SMS and email follow-up, booking and AI assistants. No enquiry is missed, and your team only talks to people who are ready to buy.',
				'button'  => 'Get my free audit',
				'points'  => array( 'Reply within one business day', 'Built in your own account', 'No lock-in' ),
				'stats'   => array(
					array( 'value' => '24/7', 'label' => 'Lead follow-up' ),
					array( 'value' => '<60s', 'label' => 'Speed-to-lead target' ),
					array( 'value' => '1', 'label' => 'Platform for CRM, funnels and AI' ),
				),
				'floaters' => array(
					array( 't' => 'Missed call, text-back sent', 'i' => 'bell', 'x' => 12, 'y' => 24 ),
					array( 't' => 'Booked: Thu 10:30', 'i' => 'check', 'x' => 86, 'y' => 20 ),
					array( 't' => 'Review request sent', 'i' => 'star', 'x' => 10, 'y' => 76 ),
					array( 't' => 'Pipeline: won', 'i' => 'chart', 'x' => 88, 'y' => 74 ),
				),
			),

			'statement' => 'Most leads are lost after the click, not before it. A missed call, a slow reply, a quote nobody chased. We build the system that [[answers in seconds]], follows up on its own and [[books the call for you.]]',

			'layers'   => array(
				'title' => 'Capture, convert, automate',
				'sub'   => 'Most businesses lose leads between the ad click and the first reply. We close those gaps with three connected layers, all inside one GoHighLevel account.',
				'items' => array(
					array(
						'name'  => 'Capture',
						'full'  => 'Funnels, websites and lead sources',
						'body'  => 'Every channel feeds one place. Fast landing pages, forms and chat capture the lead and drop it into your CRM with the right tags and source.',
						'ticks' => array( 'Funnels and landing pages built to convert', 'Website forms, chat widget and click-to-call', 'Facebook and Google lead ads connected', 'Missed-call text-back and call tracking' ),
						'where' => array( 'Website form', 'Lead ads', 'Calls', 'Chat' ),
					),
					array(
						'name'  => 'Convert',
						'full'  => 'CRM, pipelines and follow-up',
						'body'  => 'A clean pipeline shows where every deal stands. Instant replies and timed follow-ups keep leads warm until they book, buy or say no.',
						'ticks' => array( 'Custom pipelines, stages and lead scoring', 'Instant SMS, email and voicemail drops', 'Booking calendars with reminders', 'Quotes, invoices and payment links' ),
						'where' => array( 'Pipeline', 'Calendar', 'Payments' ),
					),
					array(
						'name'  => 'Automate',
						'full'  => 'Workflows, AI and reputation',
						'body'  => 'Workflows run the repetitive work around the clock. AI assistants answer, qualify and book, and happy customers are asked for a review.',
						'ticks' => array( 'Multi-step workflows with if and else logic', 'Conversation AI and Voice AI with human handoff', 'Review requests and reputation monitoring', 'Reporting dashboards and attribution' ),
						'where' => array( 'Workflows', 'Conversation AI', 'Voice AI', 'Reviews' ),
					),
				),
			),

			'cases'    => array(
				'title' => 'Systems that fit how you sell',
				'sub'   => 'Every build is shaped around your offer and sales process. Pick an industry to see what a typical setup looks like.',
				'items' => array(
					array(
						'name'  => 'Home services',
						'tab'   => 'Quotes, bookings and reviews',
						'title' => 'Never lose a quote request to a slow reply',
						'ticks' => array( 'Missed-call text-back, so every call becomes a conversation', 'Instant reply to quote requests with a booking link', 'Estimate and job pipeline with automatic reminders', 'Review request after every finished job' ),
						'steps' => array( array( '0s', 'Missed call', 'text-back sent' ), array( '1m', 'Customer replies', 'AI collects the job details' ), array( '5m', 'Estimate booked', 'calendar invite and reminder' ), array( 'Job done', 'Review request', 'link to your Google profile sent' ) ),
					),
					array(
						'name'  => 'Clinics and wellness',
						'tab'   => 'Appointments and reminders',
						'title' => 'Fuller calendars with fewer no-shows',
						'ticks' => array( 'Online booking synced to your team’s calendars', 'Confirmation and reminder messages by SMS and email', 'Re-activation campaigns for lapsed patients', 'Intake forms and consent before the visit' ),
						'steps' => array( array( '0s', 'Enquiry', 'booking link and intake form' ), array( '48h before', 'Reminder', 'confirm or reschedule by reply' ), array( '2h before', 'Final reminder', 'directions and parking' ), array( '30 days after', 'Re-activation', 'check-up offer to lapsed contacts' ) ),
					),
					array(
						'name'  => 'Agencies and coaches',
						'tab'   => 'Pipelines, onboarding and AI',
						'title' => 'One pipeline from first touch to signed client',
						'ticks' => array( 'Lead qualification with AI chat and application forms', 'Proposal, contract and payment links in one flow', 'Client onboarding automations and task assignment', 'White-label dashboards and reporting for your clients' ),
						'steps' => array( array( '0s', 'Application', 'AI checks budget and fit' ), array( '2m', 'Qualified', 'discovery call booked' ), array( 'After the call', 'Proposal sent', 'contract and payment link' ), array( 'Paid', 'Onboarding', 'tasks, welcome email and portal access' ) ),
					),
				),
				'note'  => 'Typical setups shown as examples. Your system is designed around your own offer, team and sales process.',
			),

			'process'  => array(
				'style' => 'cards',
				'title' => 'From audit to a system that runs itself',
				'steps' => array(
					array( 'Audit and map', 'We review your lead sources, tools and sales process, then map the system you actually need.' ),
					array( 'Build', 'CRM, pipelines, funnels, calendars and workflows built and tested inside your own account.' ),
					array( 'Launch and train', 'Go live with your data moved over, your team trained and clear documentation handed over.' ),
					array( 'Optimise', 'We track speed-to-lead, bookings and revenue, then refine the automations that matter.' ),
				),
			),

			'why'      => array(
				'title' => 'Done for you, done properly',
				'items' => array(
					array( 'rocket', 'Done-for-you build', 'We do the setup and configuration, not just the advice. You get a working system, not a to-do list.' ),
					array( 'check', 'You own everything', 'Built in your account. Your contacts, workflows and data stay yours. No lock-in.' ),
					array( 'doc', 'Compliance-minded', 'Consent capture, opt-outs, A2P 10DLC and email authentication set up so messages land and stay compliant.' ),
					array( 'funnel', 'Migration handled', 'We move contacts, fields and automations from your current CRM or email tool without downtime.' ),
					array( 'video', 'Training and docs', 'Short walkthrough videos and written guides so your team can use the system with confidence.' ),
					array( 'bell', 'Ongoing support', 'Optional monthly support to add workflows, fix issues and keep improving what converts.' ),
				),
			),

			'bridge'   => array(
				'to'    => 'seo',
				'marks' => array( 'google', 'chatgpt', 'gemini' ),
				'title' => 'Automation works best when there is traffic to follow up.',
				'sub'   => 'GoHighLevel turns leads into customers, and we also grow the organic traffic and AI visibility that feeds it. SEO fills the pipeline, GoHighLevel converts it, and the two are measured as one system.',
				'flow'  => array(
					array( 'Search and AI answers', 'Google, AI Overviews, ChatGPT, Gemini' ),
					array( 'Your landing page', 'Fast, answer-first, built to convert' ),
					array( 'Lead captured', 'Form, call or chat, saved with source and keyword' ),
					array( 'GoHighLevel follow-up', 'Instant SMS and email, AI assistant, reminders' ),
					array( 'Booked and won', 'Pipeline, reviews and revenue reported back' ),
				),
				'why'   => array(
					array( 'Stop paying for every lead', 'Organic rankings compound. Earn the traffic once, then let automation convert it month after month.' ),
					array( 'Higher-intent leads', 'People who found you by searching for their problem convert better than cold clicks.' ),
					array( 'One plan, one team', 'SEO, AEO, GEO and CRM automation planned together, so nothing falls between agencies.' ),
					array( 'AI visibility feeds the pipeline', 'Be the answer in ChatGPT, Gemini and Google AI, then capture and follow up every visitor it sends.' ),
				),
				'cta'   => 'See SEO, AEO and GEO',
			),

			'faq'      => array(
				'title' => 'Everything you’re wondering',
				'items' => array(
					array( 'What is GoHighLevel?', 'GoHighLevel (HighLevel) is an all-in-one platform with a CRM, sales pipelines, funnels and websites, SMS and email marketing, booking calendars, reputation tools and AI assistants, so you can replace several separate tools with one system.' ),
					array( 'Can you also bring me more leads to automate?', 'Yes. We run SEO, AEO and GEO that grow the organic traffic and AI visibility feeding your pipeline, and we measure them together with your automations.' ),
					array( 'Do I need my own GoHighLevel account?', 'Yes. HighLevel bills the platform subscription directly. We build and manage everything inside your account, so you own your data and keep the system whether or not you keep working with us.' ),
					array( 'Can you move us from another CRM or email tool?', 'Yes. We import contacts, map fields and tags, rebuild your key automations and pipelines, and run both systems side by side until the switch is safe.' ),
					array( 'Do you build AI chat and voice AI?', 'Yes. We set up conversation AI for chat, SMS and social messages, and voice AI for answering and qualifying calls, with clear handoff rules to your team.' ),
					array( 'How long does setup take?', 'A focused starter system (CRM, pipeline, lead capture and core follow-up) is usually live within one to two weeks. Bigger builds with funnels, AI and migrations take longer and are scoped after the free audit.' ),
					array( 'Is SMS and email sending compliant?', 'We set up consent capture, opt-out handling, A2P 10DLC registration where required, and email authentication, so your messages are delivered and follow the rules in your market.' ),
				),
			),

			'form'     => array(
				'title'   => 'Get your free GoHighLevel automation audit',
				'sub'     => 'Tell us how leads reach you today. We will show where enquiries slip through and the quickest automations to fix it.',
				'ticks'   => array( 'Lead flow and follow-up gap review', 'Recommended pipeline and automation map', 'Clear scope, timeline and fixed quote' ),
				'label'   => 'What do you need?',
				'options' => array( 'Full GoHighLevel build (recommended)', 'CRM and pipeline setup', 'Funnels and websites', 'Automations and AI chat', 'Move from another CRM', 'Not sure yet' ),
				'button'  => 'Request my free audit',
				'fine'    => array( 'Takes 30 seconds', 'No lock-in', 'We never share your details' ),
			),
		),
	);
	return apply_filters( 'raze_content_landers', $landers );
}

/**
 * One lander, or null.
 *
 * @param string $id Lander id.
 * @return array|null
 */
function raze_lander( $id ) {
	$all = raze_landers();
	return isset( $all[ $id ] ) ? $all[ $id ] : null;
}

/**
 * The lander shown on the current page, if any.
 *
 * @return string Lander id, or an empty string.
 */
function raze_current_lander() {
	if ( ! is_page() ) {
		return '';
	}
	$template = get_page_template_slug( get_queried_object_id() );
	foreach ( raze_landers() as $id => $lander ) {
		if ( $lander['template'] === $template ) {
			return $id;
		}
	}
	return '';
}

/**
 * Public URL of a lander: the page that uses its template, or the default
 * slug when no page uses it yet.
 *
 * @param string $id Lander id.
 * @return string
 */
function raze_lander_url( $id ) {
	$lander = raze_lander( $id );
	if ( ! $lander ) {
		return home_url( '/' );
	}
	$pages = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'meta_key'       => '_wp_page_template', // phpcs:ignore WordPress.DB.SlowDBQuery
			'meta_value'     => $lander['template'], // phpcs:ignore WordPress.DB.SlowDBQuery
			'fields'         => 'ids',
		)
	);
	return $pages ? get_permalink( $pages[0] ) : home_url( '/' . $lander['slug'] . '/' );
}

/**
 * Lander document title.
 *
 * @param array $parts Title parts.
 * @return array
 */
function raze_lander_title( $parts ) {
	$id = raze_current_lander();
	if ( $id ) {
		$parts['title'] = raze_lander( $id )['title'];
		$parts['site']  = 'Raze Premier';
		unset( $parts['tagline'] );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'raze_lander_title', 20 );

/**
 * Lander meta description, Open Graph and structured data (Service and
 * FAQPage). Skipped when an SEO plugin handles meta tags.
 */
function raze_lander_head() {
	$id = raze_current_lander();
	if ( ! $id || raze_seo_plugin_active() ) {
		return;
	}
	$l   = raze_lander( $id );
	$url = raze_lander_url( $id );
	?>
	<meta name="description" content="<?php echo esc_attr( $l['desc'] ); ?>">
	<link rel="canonical" href="<?php echo esc_url( $url ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr( $l['title'] . ' | Raze Premier' ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $l['desc'] ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta name="twitter:card" content="summary">
	<?php
	$graph = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => 'Service',
				'name'        => $l['name'],
				'description' => $l['desc'],
				'url'         => $url,
				'provider'    => array( '@id' => home_url( '/#organization' ), '@type' => 'ProfessionalService', 'name' => 'Raze Premier' ),
			),
			array(
				'@type'      => 'FAQPage',
				'mainEntity' => array_map(
					function ( $f ) {
						return array(
							'@type'          => 'Question',
							'name'           => $f[0],
							'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f[1] ),
						);
					},
					$l['faq']['items']
				),
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'raze_lander_head', 3 );

/**
 * Print a lander section part.
 *
 * @param string $part Part name in template-parts/lander.
 * @param string $id   Lander id.
 */
function raze_lander_part( $part, $id ) {
	get_template_part( 'template-parts/lander/' . $part, null, array( 'id' => $id, 'l' => raze_lander( $id ) ) );
}

/**
 * Render a whole lander page.
 *
 * @param string $id Lander id.
 */
function raze_render_lander( $id ) {
	$l = raze_lander( $id );
	get_header();
	echo '<main id="main" class="lander lander-' . esc_attr( $id ) . '">';
	raze_lander_part( 'hero', $id );
	raze_lander_part( 'statement', $id );
	raze_lander_part( 'layers', $id );
	if ( ! empty( $l['results'] ) ) {
		raze_lander_part( 'results', $id );
	}
	if ( ! empty( $l['cases'] ) ) {
		raze_lander_part( 'cases', $id );
	}
	raze_lander_part( 'process', $id );
	raze_lander_part( 'why', $id );
	raze_lander_part( 'bridge', $id );
	raze_lander_part( 'faq', $id );
	raze_lander_part( 'contact', $id );
	echo '</main>';
	get_footer();
}
