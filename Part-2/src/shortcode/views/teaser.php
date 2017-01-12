<div class="collapsible-content--container teaser" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="collapsible-content--visible" itemprop="headline">
		<span class="collapsible-content--icon <?php echo $attributes['show_icon']; ?>" aria-hidden="true" data-show-icon="<?php echo $attributes['show_icon']; ?>" data-hide-icon="<?php esc_attr_e( $attributes['hide_icon'] ); ?>"><span class="screen-reader-text">Click to reveal the answer</span></span> <?php esc_html_e( $attributes['visible_message'] ); ?>
	</div>
	<div class="collapsible-content--hidden" itemprop="description" style="display: none;"><?php echo $hidden_content; ?></div>
</div>