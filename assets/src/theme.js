import jQuery from 'jquery'
import player from './player'
import carousels from './swiper'
import tabs from './tabs'
import wizard from './wizard'

jQuery( () => {
	jQuery('.js-toggle-speed').on( 'click', function() {
		let speed = docCookies.getItem('bandwidthSpeed')
		speed = speed || 'high'
		const newValue = 'high' === speed ? 'low' : 'high'

		docCookies.setItem('bandwidthSpeed', newValue)
		window.location.reload()
	})

	jQuery('.js-hide-speed').on( 'click', function() {
		docCookies.setItem('hideBandwidthBanner', 1)
		document.getElementById('bandwidth-bar').style.display = 'none'
	})

	jQuery('.js-toggle,.js-toggle-hidden').on( 'click', function() {
		const button = jQuery( this )
		const tagerts = jQuery(button.data('target') || button.data('targets'))

		tagerts.each(function() {
			const target = jQuery( this )

			if ( button.hasClass('js-toggle-hidden')) {
				target.toggleClass('hidden')
			} else {
				target.toggle()
			}
		})
	})

	jQuery('.js-post-view').each(function() {
		const wrap = jQuery( this )
		const tabs = wrap.find( 'nav > span' )
		const tabsBg = wrap.find( 'nav > div' )
		const tabsInner = tabsBg.find('span')
		const postList = jQuery('#post-list')
		const articles = postList.find('> article')

		tabs.on( 'click', function() {
			const button = jQuery( this )

			if ( button.hasClass('text-white')) {
				return
			}

			tabs.removeClass( 'text-white' )
			button.addClass( 'text-white' )
			tabsBg.toggleClass( 'pl-2.5 pr-2.5')
			tabsInner.toggleClass('transform translate-x-full')

			if ( '.card-grid-item' === button.data('target') ) {
				postList.addClass('md:grid-cols-2 lg:grid-cols-3')
			} else {
				postList.removeClass('md:grid-cols-2 lg:grid-cols-3')
			}

			const target = jQuery( button.data('target') )
			articles.addClass('hidden')
			target.removeClass('hidden')
		})
	})

	player()
	carousels()
	tabs()
	wizard()
})
