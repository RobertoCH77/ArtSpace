<x-app-layout>
    <div class="container py-8">
        <div class="text-center mt-4 mb-4">
            <img class="mx-auto" style="height: 50px; width: auto;" src="{{ asset('imagenes/artspace-logo-obscuro.svg') }}"
                alt="artSpace">
        </div>

        <div class="container mx-auto my-8">
            <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
                
                <h2 class="text-2xl font-semibold mb-6 text-center">Enviar una solicitud para participar como Blogger</h2>
    
                <p class="text-gray-600 mb-4 text-justify">
                    Los administradores revisan a todos los miembros sus posts que publiquen. Lee y acepta las reglas de la página para enviar la solicitud.
                </p>
    
                <form action="#" method="POST">
                    @csrf
    
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-600 text-sm font-medium mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="w-full p-2 border rounded">
                    </div>
    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border rounded">
                    </div>
    
                    <div class="mb-4">
                        <label for="contenido" class="block text-gray-600 text-sm font-medium mb-2">¿Que contenido va a subir? Explica de manera detallada.</label>
                        <textarea name="contenido" id="contenido" rows="4" class="w-full p-2 border rounded resize-none"></textarea>
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-2">Reglas de la Página</label>
                        <ul class="list-disc pl-6 text-justify">
                            <li>Nuestro sitio está principalmente relacionado con anime (dibujos animados). No subas pornografía real, deepfakes o contenido fotorrealista.</li>
                            <li>Por favor, no subas contenido que parezca menor de edad.</li>
                            <li>¡Etiqueta tus posts que vas a subir con al menos 5 etiquetas! Etiqueta correctamente o serás baneado.</li>
                            <li>Es posible que alguna publicación no aparezca en la lista de inmediato y necesite aprobación.</li>
                            <li>Carga solo arte digital de alta calidad que esté terminado y publicado, no de otros artistas o bocetos. El post será eliminada si no cumple con estos requisitos.</li>
                            <li>No cargues contenido protegido por derechos de autor, incluido el contenido de Patreon y Fanbox. Esto dará lugar a la suspensión de su cuenta.</li>
                            <li>Se respetuoso en la sección de comentarios, evita comentarios raciales o de algún otro tipo de ofensa.</li>
                        </ul>
                    </div>
                    
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="acepta_reglas" class="form-checkbox">
                            <span class="ml-2">Acepto las reglas al enviar esta solicitud.</span>
                        </label>
                    </div>

    
                    <div class="flex space-x-4">
                        <button type="submit" class="flex-1 bg-blue-500 text-white p-2 rounded">Enviar</button>
                        <button type="button" class="flex-1 bg-gray-300 text-gray-700 p-2 rounded">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</x-app-layout>
