<?php namespace KnowTheCode\Module\FAQ\Templates; ?>
<div class="collapsible-content--term-container faq faq-topic--<?php esc_attr_e( $record['term_slug'] );?>">
	<h2><?php esc_html_e( $record['term_name'] ); ?></h2>
	<dl class="collapsible-content--container faq">
		<?php loop_and_render_faqs( $record['posts'] ) ?>
	</dl>
</div>