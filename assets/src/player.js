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
	button = null
	play = false
	duration = 0
	currentTime = 0
	buffered = 0
	playbackRate = 1

	constructor() {
		this.player = jQuery( '.js-player' )
		this.audio = this.player.find( '.item-audio' ).get(0)

		// Item
		this.itemImage = this.player.find('.item-image')
		this.itemTitle = this.player.find('.item-title')
		this.itemPermalink = this.player.find('.item-permalink')
		this.elemDuration = this.player.find('.js-duration')
		this.elemCurrentTime = this.player.find('.js-current-time')

		this.events()
	}

	events() {
		jQuery( this.audio )
			.on( 'timeupdate', () => {
				this.currentTime = this.audio.currentTime
				this.updateTimeDuration()
			})
			.on( 'durationchange', () => {
				this.duration = Math.floor( this.audio.duration )
				this.updateTimeDuration()
			})
			.on( 'progress', () => {
				if (this.audio.buffered && this.audio.buffered.length > 0) {
					this.buffered = this.audio.buffered.end(this.audio.buffered.length - 1)
				}
			})
			.on( 'loadeddata', () => {
				this.audio.paused && this.audio.play()
			})
			.on( 'play', () => {
				this.play = true
				this.player.addClass('playing')
				this.player.removeClass('paused')
			})
			.on( 'pause', () => {
				this.play = false
				this.player.removeClass('playing')
				this.player.addClass('paused')
			})

		this.player.find('.js-toggle-play').on( 'click', () => {
			this.togglePlay(true)
		})

		this.player.find('.js-forward').on( 'click', () => {
			this.audio.currentTime += 15
		})

		this.player.find('.js-backward').on( 'click', () => {
			this.audio.currentTime -= 15
		})

		const playbackRate = this.player.find('.js-toggle-play-rate')
		playbackRate.on( 'click', () => {
			if ( this.audio && this.audio.playbackRate) {
            	this.audio.playbackRate == 2
					? this.audio.playbackRate = 1
					: this.audio.playbackRate = this.audio.playbackRate + 0.5

				playbackRate.text(this.audio.playbackRate + 'x')
          }
		})
	}

	togglePlay( useButton ) {
		useButton = useButton || false

		if (useButton) {
			this.button.trigger('click')
			return
		}

		if (this.play) {
			this.audio.pause()
			return
		}

		this.audio.play()
	}

	updateTimeDuration() {
		this.player.css({
			'--progress-width': `${(this.currentTime / this.duration) * 100}%`,
			'--buffered-width': `${(this.buffered / this.duration) * 100}%`,
		})
		this.elemDuration.text(formatTime(this.duration))
		this.elemCurrentTime.text(formatTime(this.currentTime))
	}

	setItem( item, button ) {
		if ( this.item.audio === item.audio ) {
			this.togglePlay()
			return
		}

		this.item = item
		this.button = button

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
			this.audio.src = this.item.audio
		}

		this.showPlayer()
		this.audio.play()
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
		}, button )
	})
}
