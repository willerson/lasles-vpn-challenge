<?php
/**
 * Displays the form and fields.
 *
 * @package Fuerza
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Form</span>
		</h2>

		<div class="g-section__body">
			<form class="c-form">
				<h3 class="c-form__title">Lorem ipsum solor sit amet?</h3>
				<div class="c-form__body">
					<ul class="c-form__fields">
						<li class="c-form__field c-input">
							<span>
								<input type="text" class="c-input__input" placeholder="Type your name." />
							</span>
							<labe class="c-input__label">Your name*</labe>
						</li>
						<li class="c-form__field c-input c-input--error">
							<span>
								<input type="text" class="c-input__input" placeholder="Type your name." />
							</span>
							<labe class="c-input__label">Your name*</labe>
						</li>
						<li class="c-form__field c-input">
							<span>
								<input type="email" class="c-input__input" placeholder="Type your email." />
							</span>
							<labe class="c-input__label">Your email*</labe>
						</li>
						<li class="c-form__field c-input c-select">
							<span>
								<select class="c-select__select" placeholder="Select your subject">
									<option value="">Lorem ipsum</option>
									<option value="">Dolor sit amet</option>
									<option value="">No subject</option>
								</select>
							</span>
							<labe class="c-input__label">Your subject*</labe>
						</li>
						<li class="c-form__field c-input">
							<span>
								<textarea class="c-input__textarea"></textarea>
							</span>
							<labe class="c-input__label">Your subject*</labe>
						</li>
						<li class="c-form__field c-radio-group">
							<div class="c-radio c-input">
								<div class="c-radio__inner">
									<input class="c-radio__input" type="radio" id="inputRadioId1" name="inputRadio" checked />
									<span class="c-radio__radio"></span>
								</div>

								<label for="inputRadioId1" class="c-radio__label c-input__label">Radio</label>
							</div>

							<div class="c-radio c-input">
								<div class="c-radio__inner">
									<input class="c-radio__input" type="radio" id="inputRadioId2" name="inputRadio" />
									<span class="c-radio__radio"></span>
								</div>

								<label for="inputRadioId2" class="c-radio__label c-input__label">Radio 2</label>
							</div>

							<div class="c-radio c-radio--disabled c-input">
								<div class="c-radio__inner">
									<input class="c-radio__input" type="radio" id="inputRadioId3" name="inputRadio" disabled />
									<span class="c-radio__radio"></span>
								</div>

								<label for="inputRadioId3" class="c-radio__label c-input__label">Radio 3</label>
							</div>
						</li>
						<li class="c-form__field">
							<div class="c-checkbox c-input">
								<div class="c-checkbox__inner">
									<input class="c-checkbox__input" type="checkbox" id="inputCheckboxId1" name="inputCheckbox" />
									<span class="c-checkbox__checkbox"></span>
								</div>

								<label for="inputCheckboxId1" class="c-checkbox__label c-input__label">Checkbox</label>
							</div>

							<div class="c-checkbox c-checkbox--disabled c-input">
								<div class="c-checkbox__inner">
									<input class="c-checkbox__input" type="checkbox" id="inputCheckboxId1" name="inputCheckbox" disabled />
									<span class="c-checkbox__checkbox"></span>
								</div>

								<label for="inputCheckboxId1" class="c-checkbox__label c-input__label">Checkbox</label>
							</div>
						</li>
					</ul>
				</div>
				<div class="c-form__feet">
					<button type="submit" class="c-form__submit c-btn c-btn--primary">Send</button>
				</div>
			</form>
		</div>
	</div>
</section>
