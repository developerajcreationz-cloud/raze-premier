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
    content.php             all landing page copy (services, work, process, FAQ)
    customizer.php          Appearance > Customize > Raze Premier (email, phone, WhatsApp, booking link, socials)
    leads.php               contact form handler; saves each enquiry under wp-admin > Leads and emails it
    seo.php                 title, meta description, Open Graph, JSON-LD (ProfessionalService + FAQPage)
    helpers.php
  template-parts/sections/  one PHP file per section
  assets/css/main.css       all styles
  assets/js/main.js         animations and interactions, no dependencies
  assets/fonts/             self-hosted Archivo, Hanken Grotesk, JetBrains Mono
  assets/img/               favicon and case study images
```

## Editing

- **Copy:** `inc/content.php`. Each block is filterable (`raze_content_*`).
- **Section order:** `front-page.php`.
- **Contact details and booking link:** Appearance > Customize > Raze Premier. Empty fields stay hidden.
- **Enquiries:** wp-admin > Leads. Each lead stores the services ticked and the traffic source (UTM, gclid, fbclid or referrer).

## Copy rules

Sentence case, plain words, no em dashes, no invented numbers or testimonials. The lead report in the hero and the clinic in the AI search demo are labelled as samples on the page.
