;(function ($, window, document, undefined) {
	'use strict'

	var $ccVisible, $ccHidden, $ccIcons,
		$qaQuestion, $qaAnswer, $qaIcons;

	/**
	 * Initialize the plugin by setting the variables
	 * and binding the click event to the clickHandler
	 * for each type of visible content.
	 */
	var init = function() {
		$qaQuestion = $('.qa--question');
		$qaAnswer = $('.qa--answer');
		$qaIcons = $('.qa--icon');
		$('.qa--question').on('click', {contentType: 'qa'}, clickHandler );

		$ccVisible = $('.collapsible-content--visible');
		$ccHidden = $('.collapsible-content--hidden');
		$ccIcons = $('.collapsible-content--icon');
		$('.collapsible-content--visible').on('click', {contentType: 'collapsibleContent'}, clickHandler );
	}

	/**
	 * Click handler.  It handles showing/hiding the hidden content and changing
	 * the font icon handle.
	 *
	 * @param event
	 */
	var clickHandler = function( event ) {
		var index = getIndex( event.data.contentType, this ),
			$hiddenContent = getHiddenContent( event.data.contentType, index ),
			isHiddenContentOpen = $hiddenContent.is(':visible');

		if ( isHiddenContentOpen ) {
			$hiddenContent.slideUp();
		} else {
			$hiddenContent.slideDown();
		}

		changeIconClassname( event.data.contentType, isHiddenContentOpen, index );

		if ( event.data.contentType == 'collapsibleContent' ) {
			changeLabel( isHiddenContentOpen, $( this ) );
		}

	}

	/**
	 * Change the Icon classname based upon if the content is currently showing or not.
	 *
	 * @param contentType
	 * @param isHiddenContentOpen
	 * @param index
	 */
	function changeIconClassname( contentType, isHiddenContentOpen, index ) {
		var $element = getIcon(contentType, index),
			classNames = getIconClasses( isHiddenContentOpen, contentType );

		$element
			.removeClass( classNames.removeClassname )
			.addClass( classNames.addClassname );
	}

	/**
	 * Change the label based upon if the hidden content is visible (showing)
	 *
	 * @param isHiddenContentOpen
	 * @param $element
	 */
	function changeLabel( isHiddenContentOpen, $element ) {
		var labelAttr = isHiddenContentOpen ? 'showLabel' : 'hiddenLabel',
			$label = $element.find('.collapsible-content--label');

		$label.text( $element.data( labelAttr ) );
	}
	/***********
	 * Getters
	 **********/

	/**
	 * Get the index, i.e. the number of this element within its element array.
	 * We'll use the index to fetch the other elements from their arrays, as it's
	 * a 1:1 ratio.
	 *
	 * @param contentType
	 * @param element
	 * @returns {*|HTMLElement}
	 */
	function getIndex( contentType, element ) {
		return contentType === 'qa'
			? $qaQuestion.index( element )
			: $ccVisible.index( element );
	}

	/**
	 * Get the hidden content object from the array
	 *
	 * @param contentType
	 * @param index
	 * @returns {*|HTMLElement}
	 */
	function getHiddenContent( contentType, index ) {
		return contentType === 'qa'
			? $( $qaAnswer[index] )
			: $( $ccHidden[index] );
	}

	/**
	 * Get the icon object from the array
	 *
	 * @param contentType
	 * @param index
	 * @returns {*|HTMLElement}
	 */
	function getIcon( contentType, index ) {
		return contentType === 'qa'
			? $( $qaIcons[index] )
			: $( $ccIcons[index] );
	}

	/**
	 * Get the icon classnames to remove and add.
	 *
	 * If the hidden content is showing, then the action is hide it again. Therefore, we
	 * want to display the "show" icon; else, display the "hide" icon.
	 *
	 * @param isHiddenContentOpen
	 * @param contentType
	 * @returns {{removeClassname: *, addClassname: *}}
	 */
	function getIconClasses( isHiddenContentOpen, contentType ) {
		var iconClassnames = collapsibleContentParameters[contentType].iconClassname,
			removeClassname, addClassname;

		if ( isHiddenContentOpen ) {
			addClassname = iconClassnames.showClassname;
			removeClassname = iconClassnames.hideClassname;
		} else {
			addClassname = iconClassnames.hideClassname;
			removeClassname = iconClassnames.showClassname;
		}

		return {
			removeClassname: removeClassname,
			addClassname: addClassname,
		}
	}


	$(document).ready(function () {
		init();
	});

}(jQuery, window, document));