<div>
    <form action="#" method="POST" class="max-w-lg mx-auto p-4 bg-white rounded shadow-md">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded focus:border-blue-500 
focus:ring focus:ring-blue-200" placeholder="Seu nome">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded focus:border-blue-500 
focus:ring focus:ring-blue-200" placeholder="seuemail@exemplo.com">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 focus:outline-none 
focus:bg-blue-600">Enviar</button>
    </form>
</div>
