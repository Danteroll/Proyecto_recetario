var form = document.getElementById("registroForm");
		var nombre = document.getElementById("nombre");
		var email = document.getElementById("email");
		var password = document.getElementById("password");
		var confirm_password = document.getElementById("confirm_password");

		// Validar la longitud del campo nombre
		nombre.addEventListener("input", function(event) {
			if (nombre.validity.tooShort) {
				nombre.setCustomValidity("El nombre debe tener al menos 3 caracteres");
			} else {
				nombre.setCustomValidity("");
			}
		});

		// Validar la dirección de correo electrónico
		email.addEventListener("input", function(event) {
			if (email.validity.typeMismatch) {
				email.setCustomValidity("Ingrese una dirección de correo electrónico válida");
			} else {
				email.setCustomValidity("");
			}
		});

		// Validar la longitud de la contraseña
		password.addEventListener("input", function(event) {
			if (password.validity.tooShort) {
				password.setCustomValidity("La contraseña debe tener al menos 6 caracteres");
			} else {
				password.setCustomValidity("");
			}
		});

		// Validar que la confirmación de contraseña sea igual a la contraseña original
		confirm_password.addEventListener("input", function(event) {
			if (confirm_password.value != password.value) {
				confirm_password.setCustomValidity("La confirmación de contraseña no coincide con la contraseña original");
			} else {
				confirm_password.setCustomValidity("");
			}
		});

		// Validar el formulario antes de enviarlo
		form.addEventListener("submit", function(event) {
			if (!form.checkValidity()) {
				event.preventDefault();
			}
		});