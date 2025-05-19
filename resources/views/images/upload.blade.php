<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subir imagen
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <h1>HOLKAAASSS</h1>
        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="image" class="block w-full mb-4">
            @error('image')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Subir imagen
            </button>
        </form>
        @if($image)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-center mb-6">Resultado</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <div class="text-center">
                <h3 class="mb-2 text-lg font-semibold text-neutral-300">Original</h3>
                <img src="{{ asset('storage/' . $image->original_path) }}" alt="Imagen original" class="rounded-lg shadow max-h-96 mx-auto">
            </div>
            <div class="text-center">
                <h3 class="mb-2 text-lg font-semibold text-yellow-400">Procesada</h3>
                <img src="{{ asset('storage/' . $image->processed_path) }}" alt="Imagen procesada" class="rounded-lg shadow max-h-96 mx-auto">
            </div>
        </div>
    </div>
@endif

    </div>
</x-app-layout>
