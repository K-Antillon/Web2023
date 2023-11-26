<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lexus</title>
</head>
<body>
    <h1>LEXUS</h1>
    <br>

    <!-- Contenedor para mostrar los datos de la API -->
    <div id="datos-api"></div>

    <!-- Script para cargar y mostrar los datos de la API -->
    <script>
        // Hacer la solicitud a la API
        fetch('api_lexus.php')
            .then(response => response.json())
            .then(data => {
                // Manipular los datos y mostrarlos en el contenedor
                const contenedorDatos = document.getElementById('datos-api');

                if (data.length > 0) {
                    data.forEach(carro => {
                        const divCarro = document.createElement('div');
                        divCarro.innerHTML = `
                            <h2>${carro.id}</h2>
                            <h2>${carro.nombre}</h2>
                            <h3>${carro.marca}</h3>
                            <p>${carro.descripcion}</p>
                            <img height="200px" src="data:image/jpg;base64,${carro.imagen}">
                        
                        `;
                        contenedorDatos.appendChild(divCarro);
                    });
                } else {
                    contenedorDatos.innerHTML = '<p>No hay registros</p>';
                }
            })
            .catch(error => {
                console.error('Error al obtener datos de la API:', error);
            });
    </script>
</body>
</html>