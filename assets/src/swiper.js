import jQuery from 'jquery'

export default function() {
	if ( undefined === window.Swiper ) {
		return
	}

	jQuery( '.swiper-container' ).each(function() {
		const swiper = jQuery( this )
		const config = swiper.hasClass( 'manual' ) ? {
			direction: 'horizontal',
			slidesPerView: 1
		} : {
			direction: 'horizontal',
			spaceBetween: 20,
			breakpoints: {
				1440: {
					slidesPerView: 3,
					spaceBetween: 40,
				},
				768: {
					slidesPerView: 2,
				},
				576: {
					slidesPerView: 3,
				},
				1: {
					slidesPerView: 2,
				},
			},
			navigation: false,
		}

		if ( swiper.find( '.swiper-btn-next' ).length > 0 ) {
			config.navigation = {
				nextEl: '.swiper-btn-next',
				prevEl: '.swiper-btn-prev',
			}
		}
		if ( swiper.find( '.swiper-custom-pagination' ).length > 0 ) {
			config.pagination = {
				el: '.swiper-custom-pagination',
				clickable: true,
				bulletActiveClass: 'bg-navy-light',
				bulletClass: 'h-2 w-2 rounded-full hover:bg-navy bg-navy-lighten'
			}
		}

		new Swiper( this, config )
	})
}
