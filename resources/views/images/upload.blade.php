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
    </div>
</x-app-layout>
