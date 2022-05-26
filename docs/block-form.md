# Block Form
Displays a CF7 (Contact Form 7) form.

## Usage
Go to **Contact CPT** and register your own form. After that, on your page add de Form Block and select your created form.
When you're creating the form, please take care to use the markup below (of course that you can add/modify as needed but take care).

```html
<div class="c-form">
	<h3 class="c-form__title">Lorem ipsum dolor sit amet?</h3>

	<div class="c-form__body">
		<ul class="c-form__fields">
			<li class="c-form__field c-input">
				[text* class:c-input__input your-name] 
				<label class="c-input__label">Name full</label>
			</li>
			<li class="c-form__field c-input">
				[email* class:c-input__input your-email]
				<label class="c-input__label">Email</label>
			</li>
			<li class="c-form__field c-input">
				[textarea* class:c-input__input class:c-input__textarea your-message]
				<label class="c-input__label">Message</label>
			</li>
		</ul>
	</div>

	<div class="c-form__feet">
		[submit class:c-form__submit class:c-btn class:c-btn--primary "Send Message"]
	</div>
</div>
```

## Preview
<img style="display: block; max-width: 100%; height: auto;" src="https://gitlab.fuerzastudio.com/devops/template-wordpress/uploads/81b89dd8e4618acf750d49d0c1f35c8d/Screen_Shot_2022-04-08_at_15.24.34.png" />
