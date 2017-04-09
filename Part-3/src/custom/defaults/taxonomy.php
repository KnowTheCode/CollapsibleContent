<?php
/**
 * Runtime configuration for a taxonomy.
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

return array(
	/**=====================================
	 * The taxonomy name.
	 *======================================*/
	'taxonomy'   => '',

	/**=====================================
	 * These are label configuration.
	 *======================================*/
	'labels'     => array(
		'custom_type'       => '', // the taxonomy name from above.
		'singular_label'    => '',
		'plural_label'      => '',
		'in_sentence_label' => '',
		'text_domain'       => '',
	),

	/**=====================================
	 * These are the arguments for registering the taxonomy.
	 *======================================*/
	'args'       => array(
		'label'             => '',
		'labels'            => '', // automatically generate the labels.
	),

	/**=====================================
	 * These are the post types to bind the taxonomy to.
	 *======================================*/
	'post_types' => array( '' ),
);
