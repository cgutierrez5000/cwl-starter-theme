# CWL Starter: Design Tokens

The values live in `theme.json`. This file explains what each one is for.
When a value changes, change it in `theme.json` and update this file.

## Colors

| Slug | Hex | Use |
|---|---|---|
| navy | #1F2937 | Section backgrounds (hero, process, care, footer), dark buttons, offer-card offset shadow |
| ink | #111827 | Text on light backgrounds and text on orange buttons, chips and cards |
| primary | #F1764A | Accent buttons, highlighted card, icons, chips, links, large orange text on navy |
| primary-on-dark | #F58A63 | Small orange text (12px eyebrows) on navy only |
| primary-deep | #C2410C | Eyebrows and small labels on light backgrounds, button hover border, link hover |
| canvas | #FAF7F5 | Page background, and light text on dark sections |
| mist | #D0D0D0 | Borders, dividers, inactive dots, image placeholders |

Contrast rules:
- Text on orange is ink (about 5:1). Navy on orange is only about 4.1:1.
- Orange #F1764A on navy is only for large text. Small text on navy uses primary-on-dark.

## Text opacity

- Primary text: 100%
- Secondary text: 0.72
- Muted text: 0.62 (the lowest readable level)

## Fonts

- Headings: Nunito, variable, weights 500 to 700, self-hosted, preloaded.
  H1 600, orange highlight words 500, H2 and H3 700.
- Body: Inter, variable, weights 400 to 700, self-hosted.
- Fallback: Arial, sans-serif.

## Type scale

- H1: clamp(3.4rem, 6vw, 6.2rem), line-height 1.05, letter-spacing -0.008em
- H2: clamp(2.7rem, 5vw, 4.7rem), line-height 1.05, letter-spacing -0.012em
- H3: three sizes only: 20px (cards), 28px (feature cards), 36px (offer card)
- Body 16px / 1.6. Lead text 18px. Small text 13px.
- Eyebrow: 12px, Inter 700, uppercase, letter-spacing 0.16em
- Minimum text size anywhere: 12px

## Spacing and layout

- Scale: 4, 8, 12, 16, 24, 32, 48, 64, 96 px
- Section padding: 128px desktop, 84px mobile
- Content width: 1240px. Gutters: 20px desktop, 16px mobile
- Breakpoints: 760px (mobile), 1050px (tablet)

## Radii

Small 8px, medium 18px, large 32px, preview frame 24px, pill 999px, circle 50%.

## Buttons

All buttons: min-height 54px, padding 0 24px, pill shape, 14px, weight 700,
hover moves up 2px.
- Accent (primary call to action): orange background, ink text
- Outline: transparent, ink text (canvas text on dark sections)
- Dark: navy background, canvas text