# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the **Pfadiheim Bülach** website — a Kirby CMS 5 (Plainkit) site for a scout cabin in Bülach, Switzerland. It contains only the project-specific files (`/site`, `/content`, `/assets`); the Kirby core lives in `/kirby` (installed via Composer).

## Development Commands

```bash
# Start local dev server (PHP built-in server via Kirby's router)
composer start
# → http://localhost:8000

# Install/update dependencies
composer install
composer update
```

No build step, no bundler. CSS is plain, hand-written in `assets/css/site.css`.

## Architecture

Kirby is a flat-file CMS: pages correspond to folders under `content/`, and field values are stored in `.txt` files inside those folders. Numbered prefixes (e.g. `1_hausordnung`) control sort order and visibility (listed vs. unlisted).

### Page Structure

| Content folder | Template | Purpose |
|---|---|---|
| `home` | `default.php` | Homepage with hero image, gallery, info sections, Google Maps |
| `1_hausordnung` | `hausordnung.php` | House rules page (sections parsed from `###` headings in a textarea) |
| `impressum` | `impressum.php` | Imprint |
| `datenschutz` | `datenschutz.php` | Privacy policy |
| `cookie-einstellungen` | `cookie-einstellungen.php` | Cookie settings info page |

Navigation in `header.php` auto-generates links from `$site->children()->listed()`, excluding `impressum`, `datenschutz`, and `cookie-einstellungen`.

### Key Files

- `site/templates/default.php` — Homepage template: hero image (first image sorted by `sort`), top gallery (images 2–6), info grid (Das Heim / Lage / Geschichte), bottom gallery (images 7+), Google Maps with cookie consent
- `site/templates/hausordnung.php` — Splits a single `text` textarea on `### ` headings into rule sections
- `site/snippets/header.php` / `footer.php` — Shared layout; footer always links Hausordnung, Impressum, Datenschutz, Cookie-Einstellungen
- `site/blueprints/pages/default.yml` — Panel fields for the home page (headline, lead, reservationUrl/Label, heroImage, gallery, heimText, lageText, geschichteText, anreiseText, mapEmbedUrl)
- `site/blueprints/site/site.yml` — Global site fields: `kontakt`, `adresse` (shown in the contact section on the homepage)
- `assets/css/site.css` — All styles; no framework, no preprocessor
- `site/config/config.php` — Kirby config (`debug`, `panel.install`, `thumbs.driver: gd`)

### Google Maps / Cookie Consent

The map embed in `default.php` uses `localStorage` key `pfadiheim_map_consent` to remember user consent. No external cookie library — the consent UI is inline HTML/JS in the template.

### Image Handling

Images are uploaded via the Kirby Panel to the `home` page and sorted by the `sort` metadata field. Thumbnails are generated on-demand by Kirby using the GD driver. Image metadata (alt, caption, sort) is stored in `.txt` sidecar files next to each image in `content/home/`.

## Kirby Panel

Access at `/panel`. The first admin user must be created there on initial setup. `panel.install: true` is set in config — set it to `false` in production after setup.

## Interaction Guidelines

### Always ask clarifying questions when:
- Intent is unclear or ambiguous
- Task description allows multiple interpretations or lacks details
- Multiple technical approaches are possible
- Implementation pattern, library, or architecture is not specified
- Field names, business rules, or technical details are not explicit

### Present a plan and wait for approval when:
- Task spans multiple steps or components
- Multiple valid implementation approaches exist
- Modifications affect existing functionality

### Confirm before executing when:
- Core functionality is being modified or deleted
- Critical business logic is being adjusted
- Expected outcome is not explicitly stated
