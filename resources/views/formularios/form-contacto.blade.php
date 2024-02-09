<x-app-layout>
    <div class="container py-8">

        <div class="text-center mt-4 mb-4">
            <img class="mx-auto" style="height: 50px; width: auto;" src="{{ asset('imagenes/artspace-logo-obscuro.svg') }}"
                alt="artSpace">
        </div>

        <div class="container mx-auto my-8">
            <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
                <h2 class="text-center text-2xl font-semibold mb-6 ">Contacto</h2>
    
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
    
                    <div class="mb-6">
                        <label for="mensaje" class="block text-gray-600 text-sm font-medium mb-2">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" rows="4" class="w-full p-2 border rounded resize-none"></textarea>
                    </div>
    
                    <div class="text-center">
                        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Enviar</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</x-app-layout>
