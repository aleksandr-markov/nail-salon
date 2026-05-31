<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nails
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,300;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap"
		rel="stylesheet" />
	<style>
		:root {
			--bg: #faf5ee;
			--bg-soft: #f2e9dd;
			--ink: #2a1a1e;
			--ink-soft: #6b5a55;
			--wine: #7b2e3c;
			--wine-deep: #5c1f2a;
			--rose: #d4a4a8;
			--rose-soft: #f2dddc;
			--gold: #b8956a;
			--border: #e5d7c3;
			--green: #4a6b3e;
		}

		* {
			-webkit-font-smoothing: antialiased;
		}

		html {
			scroll-behavior: smooth;
		}

		body {
			background: var(--bg);
			color: var(--ink);
			font-family: "DM Sans", system-ui, sans-serif;
			font-weight: 400;
			letter-spacing: -0.005em;
		}

		.display {
			font-family: "Fraunces", serif;
			font-variation-settings: "opsz" 144;
			font-weight: 400;
			letter-spacing: -0.025em;
			line-height: 1;
		}

		.display-italic {
			font-family: "Fraunces", serif;
			font-style: italic;
			font-weight: 300;
		}

		.text-soft {
			color: var(--ink-soft);
		}

		.text-wine {
			color: var(--wine);
		}

		.text-gold {
			color: var(--gold);
		}

		.bg-soft {
			background: var(--bg-soft);
		}

		.bg-wine {
			background: var(--wine);
		}

		.bg-rose-soft {
			background: var(--rose-soft);
		}

		.border-soft {
			border-color: var(--border);
		}

		/* Anim */
		@keyframes rise {
			from {
				opacity: 0;
				transform: translateY(20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.rise {
			animation: rise 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
		}

		.rise-1 {
			animation-delay: 0.05s;
		}

		.rise-2 {
			animation-delay: 0.2s;
		}

		.rise-3 {
			animation-delay: 0.35s;
		}

		.rise-4 {
			animation-delay: 0.5s;
		}

		.rise-5 {
			animation-delay: 0.65s;
		}

		/* Primary CTA — high contrast wine on cream */
		.btn-primary {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 0.5rem;
			padding: 1rem 1.8rem;
			background: var(--wine);
			color: #fff;
			font-weight: 500;
			font-size: 0.95rem;
			letter-spacing: 0.01em;
			border-radius: 999px;
			transition: all 0.3s;
			box-shadow: 0 4px 16px rgba(123, 46, 60, 0.18);
			cursor: pointer;
			border: none;
		}

		.btn-primary:hover {
			background: var(--wine-deep);
			transform: translateY(-2px);
			box-shadow: 0 8px 24px rgba(123, 46, 60, 0.28);
		}

		.btn-secondary {
			display: inline-flex;
			align-items: center;
			gap: 0.5rem;
			padding: 1rem 1.8rem;
			color: var(--ink);
			font-weight: 500;
			font-size: 0.95rem;
			border-radius: 999px;
			border: 1.5px solid var(--ink);
			background: transparent;
			transition: all 0.3s;
			cursor: pointer;
		}

		.btn-secondary:hover {
			background: var(--ink);
			color: var(--bg);
		}

		.btn-ghost {
			display: inline-flex;
			align-items: center;
			gap: 0.4rem;
			color: var(--wine);
			font-weight: 500;
			font-size: 0.9rem;
			transition: gap 0.3s;
		}

		.btn-ghost:hover {
			gap: 0.8rem;
		}

		/* Pill */
		.pill {
			display: inline-flex;
			align-items: center;
			gap: 0.5rem;
			padding: 0.45rem 0.9rem;
			background: var(--rose-soft);
			color: var(--wine);
			border-radius: 999px;
			font-size: 0.78rem;
			font-weight: 500;
			letter-spacing: 0.02em;
		}

		.pill-dot {
			width: 6px;
			height: 6px;
			border-radius: 50%;
			background: var(--wine);
			animation: pulse 2s infinite;
		}

		@keyframes pulse {

			0%,
			100% {
				opacity: 1;
			}

			50% {
				opacity: 0.4;
			}
		}

		/* Cards */
		.card {
			background: #fff;
			border-radius: 24px;
			padding: 2rem;
			transition:
				transform 0.3s,
				box-shadow 0.3s;
		}

		.card:hover {
			transform: translateY(-4px);
			box-shadow: 0 12px 32px rgba(42, 26, 30, 0.06);
		}

		/* Service row */
		.service-row {
			border-bottom: 1px solid var(--border);
			transition:
				padding 0.3s,
				background 0.3s;
		}

		.service-row:hover {
			padding-left: 1rem;
		}

		/* Gallery image */
		.gallery-item {
			position: relative;
			overflow: hidden;
			border-radius: 16px;
			cursor: pointer;
		}

		.gallery-item img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			transition: transform 0.6s;
		}

		.gallery-item:hover img {
			transform: scale(1.05);
		}

		/* Star */
		.star {
			color: var(--gold);
		}

		/* Sticky mobile CTA */
		.mobile-cta {
			position: fixed;
			bottom: 1rem;
			left: 1rem;
			right: 1rem;
			z-index: 60;
			display: none;
		}

		@media (max-width: 768px) {
			.mobile-cta {
				display: flex;
			}

			.mobile-cta a {
				flex: 1;
				justify-content: center;
			}
		}

		/* FAQ */
		details {
			border-bottom: 1px solid var(--border);
			padding: 1.2rem 0;
		}

		details>summary {
			list-style: none;
			cursor: pointer;
			display: flex;
			justify-content: space-between;
			align-items: center;
			font-weight: 500;
			font-size: 1.05rem;
		}

		details>summary::-webkit-details-marker {
			display: none;
		}

		details>summary::after {
			content: "+";
			font-size: 1.6rem;
			font-weight: 300;
			color: var(--wine);
			transition: transform 0.3s;
		}

		details[open]>summary::after {
			transform: rotate(45deg);
		}

		details>div {
			margin-top: 0.8rem;
			color: var(--ink-soft);
			line-height: 1.65;
		}

		/* Nav blur */
		.nav-blur {
			background: rgba(250, 245, 238, 0.85);
			backdrop-filter: blur(12px);
			-webkit-backdrop-filter: blur(12px);
			border-bottom: 1px solid var(--border);
		}

		/* Marquee */
		@keyframes scroll {
			from {
				transform: translateX(0);
			}

			to {
				transform: translateX(-50%);
			}
		}

		.marquee {
			animation: scroll 50s linear infinite;
		}

		/* Decorative blob */
		.blob {
			position: absolute;
			border-radius: 50%;
			filter: blur(80px);
			opacity: 0.3;
			pointer-events: none;
		}

		@media (max-width: 768px) {
			.hero-h1 {
				font-size: 11vw !important;
				line-height: 1 !important;
			}
		}
	</style>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'nails'); ?></a>

		<header id="masthead" class="site-header">
			<nav class="sticky top-0 left-0 right-0 z-50 nav-blur">
				<div class="max-w-[1400px] mx-auto px-5 md:px-8 py-4 flex justify-between items-center">
					<a href="#" class="display text-2xl tracking-tight">BLOOM<span class="text-wine">.</span></a>
					<div class="hidden md:flex gap-8 text-sm">
						<a href="#poslugy" class="hover:text-wine transition-colors">Послуги</a>
						<a href="#roboty" class="hover:text-wine transition-colors">Роботи</a>
						<a href="#master" class="hover:text-wine transition-colors">Майстер</a>
						<a href="#vidguky" class="hover:text-wine transition-colors">Відгуки</a>
						<a href="#faq" class="hover:text-wine transition-colors">Питання</a>
					</div>
					<div class="flex items-center gap-3">
						<a href="tel:+380000000000" class="hidden md:inline text-sm hover:text-wine">+380 00 000
							0000</a>
						<a href="#zapys" class="btn-primary"
							style="padding: 0.65rem 1.3rem; font-size: 0.85rem">Записатись</a>
					</div>
				</div>
			</nav>
		</header><!-- #masthead -->