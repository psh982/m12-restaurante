   // Validar Nombre
        // Seleccionar el formulario, el campo de entrada y los elementos de error
        const formNombreApellidos = document.querySelector('form');
        const inputNombreApellidos = document.getElementById('nombre_apellidos');
        const errorNombreApellidos = document.getElementById('error_nombre_apellidos');
        
        // Agregar un escucha de eventos de envío al formulario
        formNombreApellidos.addEventListener('submit', function(event) {
            // Obtener y recortar el valor del campo "Nombre"
            const nombreApellidos = inputNombreApellidos.value.trim();
    
            // Verificar si el campo está vacío
            if (nombreApellidos === '') {
                event.preventDefault();
                errorNombreApellidos.textContent = 'Por favor, ingresa tu nombre y apellidos.';
                document.getElementById('nombre_apellidos').style.borderColor = "red";
            } 
            // Verificar si el formato del nombre y apellidos es incorrecto
            else if (!/^[a-zA-Z]{3,}(?:\s[a-zA-Z]{3,})*$/.test(nombreApellidos)) {
                event.preventDefault();
                errorNombreApellidos.textContent = 'El formato del nombre y apellidos es incorrecto.';
                document.getElementById('nombre_apellidos').style.borderColor = "red";
            } 
            // Si todo es válido, restablecer el mensaje de error y el color del borde
            else {
                errorNombreApellidos.textContent = '';
                document.getElementById('nombre_apellidos').style.borderColor = "black";
            }
        });
