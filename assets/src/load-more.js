import jQuery from 'jquery'

export default function() {
	const container = jQuery( '#post-list' )
	const loadButton = jQuery('.js-load-more')
	loadButton.on( 'click', 'a', function() {
		const link = jQuery( this )
		const href = link.attr('href')

		jQuery.get( href, function(response) {
			const html = jQuery(response)
			container.append( html.find( '#post-list' ).html() )

			const newLink = html.find('.js-load-more a')

			if ( newLink.length > 0 ) {
				link.attr('href', newLink.attr('href'))
			} else {
				loadButton.hide()
			}
		})

		return false
	})
}
