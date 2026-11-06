# Raze Premier

Custom WordPress theme for [razepremier.com](https://razepremier.com): a one-page landing site for the agency's services (branding, website development, SEO with AEO and GEO, video editing, Meta Ads, Google Ads and lead funnels).

The theme lives in `wp-content/themes/raze-premier/` and mirrors where it sits on the server.

## Structure

```
raze-premier/
  style.css                 theme header
  functions.php             setup, assets, includes
  front-page.php            landing page: lists the sections in order
  header.php / footer.php
  page.php / index.php / 404.php
  inc/
    content.php             all landing page copy (services, work, workflow, results, reviews, FAQ)
    landers.php             the two service landers (SEO, AEO and GEO; GoHighLevel automation): all copy, titles and schema
    marks.php               brand marks (Google, ChatGPT, Gemini...) used in the hero, Simple Icons CC0
    customizer.php          Appearance > Customize > Raze Premier (email, phone, WhatsApp, booking link, socials)
    leads.php               contact form handler; saves each enquiry under wp-admin > Leads and emails it
    seo.php                 title, meta description, Open Graph, JSON-LD (ProfessionalService + FAQPage)
    helpers.php
  template-parts/preloader.php   glowing-eyes preloader, shown on every homepage load
  templates/                page templates for the landers
  template-parts/lander/    lander sections, filled from inc/landers.php
  template-parts/sections/  one PHP file per section
  assets/css/main.css       all styles
  assets/js/main.js         animations and interactions, no dependencies
  assets/fonts/             self-hosted Geist and Geist Mono (OFL), Archivo for the wordmark
  assets/img/               favicon and case study images
```

## Editing

- **Copy:** `inc/content.php`. Each block is filterable (`raze_content_*`).
- **Section order:** `front-page.php`. Current order: hero, services (What we do), work (stacked cards), process, results, reviews, contact, then the footer. The FAQ section still exists (`faq.php`) but is not on the page; add it back there and return true from the `raze_show_faq_schema` filter to bring back the FAQ schema.
- **Contact details and booking link:** Appearance > Customize > Raze Premier. Empty fields stay hidden.
- **Enquiries:** wp-admin > Leads. Each lead stores the services ticked and the traffic source (UTM, gclid, fbclid or referrer).

## Landers

Two focused pages, each a WordPress page using a lander template (Page Attributes > Template):

- **SEO, AEO and GEO** at `/seo-aeo-geo/` (template "Lander: SEO, AEO and GEO")
- **GoHighLevel automation** at `/gohighlevel-automation/` (template "Lander: GoHighLevel automation")

The homepage links to them (the SEO and Lead funnels service cards, and the footer). A lander never links back to the homepage: its nav, logo and footer stay on the page, and its only outbound link is the section that points to the other lander. Lander forms post to the same handler, so enquiries appear under wp-admin > Leads with the page they came from.

## Copy rules

Sentence case, plain words, no em dashes, no invented numbers or testimonials. The figures in the results section describe how we work, not client results. Wall of Love cards with `'sample' => true` in `raze_reviews()` are placeholders and show a "Sample" label on the page: replace them with real reviews (and set `sample` to false) before launch, or delete them.
