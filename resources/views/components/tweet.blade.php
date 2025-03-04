@props([
    'tweet',          // El objeto Tweet que ya tenías
    'isOwnerProfile' => false  // Nueva prop para controlar los botones
])
<div 
    class="max-w-xl my-4 mx-auto p-4 border-2 border-transparent rounded-lg 
    transform-gpu transition-transform duration-300 relative group
    hover:border-gray-800 hover:translate-x-3 hover:-translate-y-3 hover:rotate-1"
    x-data="{ editing: false, showOptions: false, content: '{{ $tweet->content }}' }"
>
    @if($isOwnerProfile)
    <!-- Menú de opciones -->
    <div class="absolute top-3 right-3 z-10">
        <button 
            @click="showOptions = !showOptions" 
            class="text-gray-500 hover:text-white transition-colors"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </button>
        
        <!-- Menú desplegable -->
        <div 
            x-show="showOptions" 
            @click.away="showOptions = false"
            class="absolute right-0 mt-2 w-48 bg-[#192734] rounded-lg shadow-xl border border-gray-700"
        >
            <div class="p-2 space-y-2">
                <button 
                    @click="editing = true; showOptions = false"
                    class="w-full px-4 py-2 text-left text-blue-500 hover:bg-[#22303c] rounded-lg transition-colors"
                >
                    Editar
                </button>
                <button 
                    @click="if(confirm('¿Eliminar tweet permanentemente?')) {
                        fetch('{{ route('tweets.destroy', $tweet) }}', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then(() => window.location.reload())
                    }"
                    class="w-full px-4 py-2 text-left text-red-500 hover:bg-[#22303c] rounded-lg transition-colors"
                >
                    Eliminar
                </button>
            </div>
        </div>
    </div>
    @endif

    <div class="flex items-start space-x-3">
        <!-- Avatar -->
        @if ($tweet->user && $tweet->user->user_photo)
        <img src="{{ asset('storage/' . $tweet->user->user_photo) }}" 
             alt="Avatar" 
             class="w-12 h-12 rounded-full object-cover">
        @else
        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        @endif

        <!-- Contenido principal -->
        <div class="flex-1">
            <!-- Información del usuario -->
            <div class="flex items-center space-x-2">
                @if ($tweet->user)
                    <span class="font-bold">{{ $tweet->user->name ?? 'Usuario desconocido' }}</span>
                @else
                    <span class="text-red-500">Cuenta eliminada</span>
                @endif
                <span class="text-gray-500">·</span>
                <span class="text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
            </div>

            <!-- Contenido editable -->
            <template x-if="!editing">
                <p class="text-white mt-2">{{ $tweet->content }}</p>
            </template>
            
            <template x-if="editing">
                <div class="mt-2 space-y-2">
                    <textarea 
                        x-model="content" 
                        class="w-full bg-transparent text-white border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="3"
                    ></textarea>
                    <div class="flex justify-end space-x-2">
                        <button 
                            @click="editing = false" 
                            class="px-4 py-2 text-gray-400 hover:text-white transition-colors"
                        >
                            Cancelar
                        </button>
                        <button 
                            @click="fetch('{{ route('tweets.update', $tweet) }}', {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ content: content })
                            }).then(() => {
                                editing = false;
                                window.location.reload();
                            })"
                            class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors"
                        >
                            Guardar
                        </button>
                    </div>
                </div>
            </template>

            <!-- Botón de Me Gusta -->
            <div class="flex items-center space-x-2 mt-2">
                <form action="{{ route($tweet->isLikedBy(auth()->user()) ? 'tweets.unlike' : 'tweets.like', $tweet) }}"
                    method="POST">
                    @csrf
                    @if ($tweet->isLikedBy(auth()->user()))
                        @method('DELETE')
                    @endif

                    <button type="submit" class="flex items-center hover:text-red-500 transition-colors">
                        <svg class="w-5 h-5" fill="{{ $tweet->isLikedBy(auth()->user()) ? '#ef4444' : 'none' }}"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span class="ml-1">{{ $tweet->likes->count() }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>