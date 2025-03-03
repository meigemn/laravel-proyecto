@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-navbar />
<div class="min-h-screen bg-[#15202b] text-white">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-[#192734] rounded-xl p-6 shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Editar Perfil</h2>
            
            @if(session('success'))
                <div class="bg-green-500/20 text-green-500 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Foto de perfil -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Foto de perfil</label>
                    <div class="flex items-center space-x-4">
                        <img id="preview" src="{{ $user->user_photo ? asset('storage/'.$user->user_photo) : 'https://via.placeholder.com/150' }}" 
                             class="h-24 w-24 rounded-full object-cover border-2 border-[#15202b]">
                        <input type="file" name="profile_photo" id="profile_photo" 
                               class="hidden" accept="image/*">
                        <button type="button" onclick="document.getElementById('profile_photo').click()" 
                                class="px-4 py-2 bg-blue-500/10 border border-blue-500 rounded-full text-blue-500 hover:bg-blue-500/20 transition">
                            Cambiar foto
                        </button>
                    </div>
                </div>

                <!-- Nombre -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium mb-2">Nombre</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $user->name) }}"
                           class="w-full bg-[#192734] border border-gray-700 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <!-- Contraseña -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium mb-2">Nueva contraseña</label>
                    <input type="password" name="password" id="password" 
                           class="w-full bg-[#192734] border border-gray-700 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="w-full bg-[#192734] border border-gray-700 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('profile') }}" 
                       class="px-6 py-2 bg-transparent border border-gray-600 rounded-full hover:bg-gray-600/10 transition">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-500 rounded-full hover:bg-blue-600 transition">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview de la imagen seleccionada
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('preview').src = reader.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>