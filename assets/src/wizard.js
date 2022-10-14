class Wizard {
	form = null
	step = 0
	count = 0
	isThankyou = false

	constructor(form) {
		this.form = form
		this.wrap = form.find('>section')
		this.thankyou = form.find('> [data-thankyou]')
		this.btnBack = form.find('.js-back')
		this.btnNext = form.find('.js-next')
		this.btnComplete = form.find('.js-complete')
		this.btnReset = form.find('.js-reset')
		this.steps = form.find('.js-step')
		this.count = this.steps.length
		this.toggleStep()
		this.events()
	}

	events() {
		this.btnBack.on('click', this.handleBack )
		this.btnNext.on('click', this.handleForward )
		this.btnComplete.on('click', this.handleComplete )
		this.btnReset.on('click', this.handleReset )
	}

	canForward() {
		var isValid = true
		this.form.find(':input[required]:visible').each(function() {
			if ( ! this.checkValidity() ) {
				isValid = false
				return false
			}
		})

		return isValid
	}

	handleReset = () => {
		this.step = 0
		this.isThankyou = false
		this.form.get(0).reset()
		this.toggleStep()
	}

	handleBack = () => {
		this.step--
		this.toggleStep()
	}

	handleForward = () => {
		if ( this.canForward() ) {
			this.step++
			this.toggleStep()
		} else {
			this.steps.removeClass('form-invalid')
			this.steps.eq(this.step).addClass('form-invalid')
		}
	}

	handleComplete = () => {
		if ( this.canForward() ) {
			this.isThankyou = true
			this.toggleStep()

			const myFormData = new FormData(this.form.get(0))
            const formDataObj = {}
            myFormData.forEach((value, key) => (formDataObj[key] = value))

			if ( undefined !== formDataObj.sa_zip ) {
				formDataObj.ba_zip = formDataObj.sa_zip
			}

			jQuery.ajax({
				type: 'POST',
				url: this.form.attr('action'),
				data: formDataObj,
			})

		} else {
			this.steps.removeClass('form-invalid')
			this.steps.eq(this.step).addClass('form-invalid')
		}
	}

	toggleStep() {
		this.steps.addClass('hidden')
		this.steps.eq(this.step).removeClass('hidden')

		if (this.isThankyou) {
			this.wrap.hide()
			this.thankyou.show()
		} else {
			this.wrap.show()
			this.thankyou.hide()
		}

		// Buttons.
		if ( this.step > 1 ) {
			this.btnBack.removeClass('hidden')
		}

		if (this.step === this.count - 1) {
			this.btnBack.addClass('hidden')
			this.btnNext.addClass('hidden')
			this.btnComplete.removeClass('hidden')
		}
	}
}
export default function() {
	const forms = jQuery('.form-wizard')

	forms.each(function() {
		new Wizard(jQuery(this))
	})
}
