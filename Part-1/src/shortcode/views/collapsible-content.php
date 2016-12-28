<div<?php echo $id; ?> class="collapsible-content--container<?php echo $class; ?>">
	<div class="collapsible-content--visible" data-hidden-label="<?php esc_html_e( $attributes['hidden_label'] ); ?>" data-show-label="<?php echo $visible_label; ?>">
		<span class="collapsible-content--label"><?php echo $visible_label; ?></span><span class="collapsible-content--icon <?php esc_attr_e( $attributes['show_icon'] ); ?>" aria-hidden="true"><span class="screen-reader-text">Click to reveal the content</span></span>
	</div>
	<div class="collapsible-content--hidden" style="display: none;"><?php echo wpautop( $content ); ?></div>
</div>