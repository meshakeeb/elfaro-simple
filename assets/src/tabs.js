export default function() {

	jQuery('.js-tabs').each(function() {
		const wrap = jQuery( this )
		const tabs = wrap.find( 'nav > span' )
		const tabsBg = wrap.find( 'nav > div' )
		const tabsInner = tabsBg.find('span')
		const contents = wrap.find('> section > div')

		tabs.on( 'click', function() {
			const button = jQuery( this )

			if ( button.hasClass('text-white')) {
				return
			}

			tabs.removeClass( 'text-white' )
			button.addClass( 'text-white' )
			tabsBg.toggleClass( 'pl-2.5 pr-2.5')
			tabsInner.toggleClass('transform translate-x-full')

			const target = jQuery( button.data('target') )
			contents.hide()
			target.show()
		})
	})
}
