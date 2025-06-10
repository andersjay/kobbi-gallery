<div class="max-w-[1300px] mx-auto pt-6 px-6 md:px-8 py-4 w-full border-[#D1D1D1] border">
    <h2 class="text-xl text-center md:text-left text-gray-800 font-light ">ASSINE A NOSSA NEWSLETTER</h2>
    <form wire:submit.prevent="subscribe" class="w-full mx-auto py-4 flex flex-col md:items-center md:flex-row gap-4">
        @csrf

        <div class="mb-4 w-full">
            <label for="name" class="block text-gray-500">Nome*</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border text-gray-950 border-gray-300 focus:border-blue-500
focus:ring focus:ring-blue-200" placeholder="Seu nome">
        </div>

        <div class="mb-4 w-full">
            <label for="email" class="block text-gray-500">E-mail*</label>
            <input type="email" id="email" wire:model="email" required class="mt-1 block w-full p-2 border text-gray-950 border-gray-300 focus:border-blue-500
focus:ring focus:ring-blue-200" placeholder="seuemail@exemplo.com">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="max-w-52 w-full h-10 md:mt-3 bg-[#D1D1D1] text-black py-2 hover:brightness-95 focus:outline-none
focus:bg-gray-800">Inscreva-se</button>
    </form>
    @if (session()->has('message'))
        <div class="text-green-600 mt-2">{{ session('message') }}</div>
    @endif
</div>
