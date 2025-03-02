<div
    class="max-w-xl my-4 mx-auto p-4 border-2 border-transparent rounded-lg 
transform-gpu transition-transform duration-300 
hover:border-gray-800 
hover:translate-x-3 hover:-translate-y-3 hover:rotate-1">
    <!-- Cabecera del Tweet -->
    <div class="flex items-start space-x-3">
        <!-- Avatar -->
        @if ($tweet->user && $tweet->user->user_photo)
            <img src="{{ $tweet->user->user_photo }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
        @else
            <!-- Avatar por defecto -->
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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

            <!-- Contenido del Tweet -->
            <p class="text-black mt-2">
                {{ $tweet->content }}
            </p>

            <!-- Acciones del Tweet -->
            <!-- Botón de Me Gusta -->
            <div class="flex items-center space-x-2">
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
