<?php
/**
 * Donation one time
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

?>
<form class="py-5 text-xs form-wizard" action="https://dev.haventoday.org/wp-json/haven/v1/checkout">

	<div data-thankyou class="hidden">
		<div class="rounded-lg p-10 prose-2xl text-center font-serif normal-case">
			<h3 class="text-navy">Thank you!</h3>

			<p class="text-navy-light">
				Your donation to El Faro will help spread the Gospel of Jesus Christ into Cuba. Thank you for your support.
			</p>

			<button type="button" class="<?php echo Helpers::button_classes( 'bg-aqua hover:bg-aqua-lighten text-white mx-auto js-reset' ); ?>">
				Close
			</button>
		</div>
	</div>

	<section>

		<div class="grid grid-cols-12 gap-2.5 hidden js-step">

			<div class="flex flex-col col-span-6">
				<label for="firstname">First Name</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" name="first_name" id="firstname" required>
			</div>

			<div class="flex flex-col col-span-6">
				<label for="lastname">Last Name</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" name="last_name" id="lastname" required>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="email">Email Address</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="email" name="email" id="email" required>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="phone">Phone Number</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="tel" name="phone" id="phone" pattern="[0-9]{10}" required>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="address_1">Address 1</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" name="address_1" id="address_1" required>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="address_2">Address 2</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" name="address_2" id="address_2">
			</div>

			<div class="flex flex-col col-span-6">
				<label for="city">City</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" name="city" id="city" required>
			</div>

			<div class="flex flex-col col-span-3">
				<label for="state">State</label>
				<select class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" name="state" id="state" required>
					<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CZ">CZ</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="DC">DC</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="GU">GU</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="PR">PR</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VI">VI</option>
					<option value="VA">VA</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
				</select>
			</div>

			<div class="flex flex-col col-span-3">
				<label for="zip">Zip</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="text" pattern="[0-9]{5}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="postcode" id="zip" required>
			</div>

		</div>

		<div class="grid grid-cols-12 gap-2.5 hidden js-step">

			<div class="flex flex-col col-span-12">
				<label for="radio_attribution">How do you listen?</label>
				<select name="radio_attribution" id="radio_attribution" class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" required>
					<option value="My Local Radio Station" >My Local Radio Station</option>
					<option value="Mobile App" >Mobile App</option>
					<option value="Internet" >Internet</option>
					<option value="Other / I don&#039;t know" >Other / I don&#039;t know</option>
				</select>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="questionscomments">Questions or comments</label>
				<textarea class="mt-1 rounded border border-gray-darken px-2.5 text-base" rows="5" name="comment" id="questionscomments"></textarea>
			</div>

		</div>

		<div class="grid grid-cols-12 gap-2.5 hidden js-step">

			<div class="flex flex-col col-span-12">
				<label for="price">Donation Amount</label>
				<span class="input-group flex flex-row items-center">
					<span class="input-prepend">$</span>
					<input class="px-2.5 text-base" type="number" name="price" id="price" required>
				</span>
			</div>

			<div class="flex flex-col col-span-12">
				<label for="cardnumber">Card number</label>
				<input class="mt-1 rounded h-10 border border-gray-darken px-2.5 text-base no-arrows" type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="card_number" id="cardnumber" required>
			</div>

			<div class="flex flex-col col-span-4">
				<label for="card_expiry_month">Expiration<br/>Month</label>
				<select name="card_expiry_month" id="card_expiry_month" class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" required>
					<?php for( $i=1;$i<13;$i++) : ?>
					<option value="<?php printf( "%02d", $i ); ?>"><?php printf( "%02d", $i ); ?></option>
					<?php endfor; ?>
				</select>
			</div>

			<div class="flex flex-col col-span-4">
				<label for="card_expiry_year"><br/>Year</label>
				<select name="card_expiry_year" id="card_expiry_year" class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" required>
					<?php $year = date('Y'); ?>
					<?php for( $i=0;$i<7;$i++) : ?>
					<option value="<?php echo substr( $year + $i, 2 ); ?>"><?php echo $year + $i; ?></option>
					<?php endfor; ?>
				</select>
			</div>

			<div class="flex flex-col col-span-4">
				<label for="cvc"><br/>CVC</label>
				<input class="mt-1 rounded border border-gray-darken h-10 px-2.5 text-base" type="number" name="card_csc" id="cvc" onKeyPress="if(this.value.length==3) return false;" required>
			</div>

		</div>

		<div class="grid grid-cols-3 mt-5">

			<div class="col-start-1 flex justify-center">
				<button type="button" class="<?php echo Helpers::button_classes( 'hidden border-none text-gray sm:hover:text-black js-back' ); ?>">
					<?php Helpers::icon( 'arrow', [ 'class' => 'h-3 w-3 transform rotate-180' ] ); ?>
					Back
				</button>
			</div>

			<div class="col-start-2 flex justify-center">
				<button type="button" class="<?php echo Helpers::button_classes( 'bg-aqua hover:bg-aqua-lighten text-white js-next' ); ?>">
					Continue
					<?php Helpers::icon( 'arrow', [ 'class' => 'h-3 w-3' ] ); ?>
				</button>

				<button type="button" class="<?php echo Helpers::button_classes( 'hidden bg-aqua hover:bg-aqua-lighten text-white js-complete' ); ?>">
					Complete
					<?php Helpers::icon( 'arrow', [ 'class' => 'h-3 w-3' ] ); ?>
				</button>
			</div>

			<div class="col-span-3 flex justify-center">
				<p class="font-serif normal-case text-navy-light text-center w-4/5 mt-5">
				Secure Payment · This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.
				</p>
			</div>

		</div>
	</section>

	<input type="hidden" name="country" value="US">
	<input type="hidden" name="product" value="cuba_give">

</form>
