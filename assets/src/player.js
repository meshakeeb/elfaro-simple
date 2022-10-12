import jQuery from 'jquery'

function formatTime( secs ) {
	let minutes = Math.floor(secs / 60),
		seconds = Math.floor(secs % 60),
		returnedMinutes = minutes < 10 ? `0${minutes}` : `${minutes}`,
		returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`

	return `${returnedMinutes}:${returnedSeconds}`
}

class Player {
	item = {
		audio: false,
		title: false,
		image: false,
		permalink: false,
		button: false,
	}
	show = false
	play = false
	loading = false
	duration = 0
	currentTime = 0
	buffered = 0
	playbackRate = 1

	constructor() {
		this.player = jQuery( '.js-player' )
		this.audio = this.player.find( '.item-audio' )
		this.progressbar = this.player.find('#progressbar')

		// Item
		this.itemImage = this.player.find('.item-image')
		this.itemTitle = this.player.find('.item-title')
		this.itemPermalink = this.player.find('.item-permalink')

		this.events()
	}

	events() {
		this.audio
			.on( 'timeupdate', () => {
				this.currentTime = this.audio.currentTime
			})
			.on( 'durationchange', () => {
				this.duration = Math.floor( this.audio.duration )

				// progressbar.addEventListener('input', () => {
				// 	this.audio.currentTime = this.currentTime
				// })
			})
			.on( 'progress', () => {
				if (this.audio.buffered && this.audio.buffered.length > 0) {
					this.buffered = this.audio.buffered.end(this.audio.buffered.length - 1)
				}
			})
			.on( 'loadeddata', () => {
				this.audio.paused && this.audio.play()
				this.loading = false
			})
			.on( 'play', () => {
				this.play = true
			})
			.on( 'pause', () => {
				this.play = false
			})
	}

	setItem( item ) {
		this.item = item

		this.itemImage.hide()
		this.itemTitle.hide()
		this.itemPermalink.hide()

		if ( this.item.image ) {
			this.itemImage.attr( 'src', this.item.image )
			this.itemImage.show()
		}

		if ( this.item.title ) {
			this.itemTitle.html( this.item.title )
			this.itemTitle.show()
		}

		if ( this.item.permalink ) {
			this.itemPermalink.attr( 'href', this.item.permalink )
			this.itemPermalink.show()
		}

		if ( this.item.audio ) {
			this.audio.attr( 'src', this.item.audio )
		}

		this.showPlayer()
		this.audio.get(0).play()
	}

	showPlayer() {
		this.player.removeClass('translate-y-full')
	}

	hidePlayer() {
		this.player.addClass('translate-y-full')
	}
}

export default function() {
	const toggleButton = ( button ) => {
		button.toggleClass('active')
		button.find('.toggle-play').each(function() {
			const target = jQuery( this )
			target.toggle()
		})
	}

	const player = new Player()
	jQuery('.js-play-audio').on( 'click', function() {
		const button = jQuery( this )
		const article = button.closest('article')
		const active = jQuery('.js-play-audio.active')

		if ( active.length > 0 && ! button.is(active) ) {
			toggleButton( active )
		}

		toggleButton( button )
		player.setItem({
			audio: button.data('audio'),
			title: article.find('h2').text(),
			image: article.find('img').attr('src'),
			permalink: article.find('a').attr('href'),
			button: button
		})
	})

	// player: {
		// [':style']() {
		// return {
		// 	'--progress-width': `${(this.currentTime / this.duration) * 100}%`,
		// 	'--buffered-width': `${(this.buffered / this.duration) * 100}%`,
		// }
		// },

		// ['@play-audio.window']() {
		// return this.$event.detail.audio && !this.loading
		// 	? (this.$event.detail.audio == this.item.audio
		// 		? this.togglePlay()
		// 		: this.item = (({ audio, title, image, permalink }) => ({ audio, title, image, permalink }))(this.$event.detail)
		// 	)
		// 	: false
		// },
	// },

	// togglePlay() { this.play = !this.play },

	// togglePlaybackRate() {
		// if (audio && audio.playbackRate) {
		// audio.playbackRate == 2
		// 	? audio.playbackRate = 1
		// 	: audio.playbackRate = audio.playbackRate + 0.5
		// this.playbackRate = audio.playbackRate
		// }
	// },
}
