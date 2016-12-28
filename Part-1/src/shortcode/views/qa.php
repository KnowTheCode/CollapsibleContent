<dl<?php echo $id; ?> class="qa--container<?php echo $class; ?>">
	<dt class="qa--question" itemscope itemtype="http://schema.org/Question">
		<span class="qa--icon <?php esc_attr_e( $attributes['show_icon'] ); ?>" aria-hidden="true"><span class="screen-reader-text">Click to reveal the answer</span></span> <?php esc_html_e( $attributes['question'] ); ?>
	</dt>
	<dd class="qa--answer" itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" style="display: none;"><?php echo wpautop( $content ); ?></dd>
</dl>