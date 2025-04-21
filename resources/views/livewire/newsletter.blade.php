<div class="container mx-auto pt-6 md:px-8 py-4 w-full">
    <h2 class="text-xl text-center md:text-left text-gray-800 font-light ">ASSINE A NOSSA NEWSLETTER</h2>
    <form action="#" method="POST" class="w-full mx-auto p-4 flex flex-col md:items-center md:flex-row gap-4">
        @csrf

        <div class="mb-4 w-full">
            <label for="name" class="block text-gray-500">Primeiro nome*</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border text-gray-950 border-gray-300 rounded focus:border-blue-500 
focus:ring focus:ring-blue-200" placeholder="Seu nome">
        </div>

        <div class="mb-4 w-full">
            <label for="email" class="block text-gray-500">Email*</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full p-2 border text-gray-950 border-gray-300 rounded focus:border-blue-500 
focus:ring focus:ring-blue-200" placeholder="seuemail@exemplo.com">
        </div>

        <button type="submit" class="max-w-52 w-full h-10 md:mt-3 bg-gray-950 text-white py-2 rounded hover:bg-gray-800 focus:outline-none 
focus:bg-gray-800">Inscreva-se</button>
    </form>
</div>
