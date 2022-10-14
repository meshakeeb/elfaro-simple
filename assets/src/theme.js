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

	jQuery('.js-toggle').on( 'click', function() {
		const button = jQuery( this )
		const tagerts = jQuery(button.data('target') || button.data('targets'))

		tagerts.each(function() {
			const target = jQuery( this )
			target.toggle()
		})
	})

	player()
	carousels()
	tabs()
	wizard()
})
