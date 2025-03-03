@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-navbar />
<div class="min-h-screen bg-[#15202b] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="flex justify-between items-center py-4 border-b border-gray-800">
            <div class="flex items-center space-x-4">
                <!-- Logo Twitter -->
                <svg viewBox="0 0 24 24" class="h-8 w-8 text-blue-500" fill="currentColor">
                    <g><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"/></g>
                </svg>
                <h1 class="text-xl font-bold">Perfil</h1>
            </div>
        </div>

        <!-- Sección principal del perfil -->
        <div class="mt-8 max-w-2xl mx-auto">
            <div class="bg-[#192734] rounded-xl p-6 shadow-lg">
                <!-- Encabezado del perfil -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Avatar del usuario -->
                        <img src="{{ $user->user_photo}}"  
                             class="h-24 w-24 rounded-full border-4 border-[#15202b] object-cover"
                             alt="Foto de perfil de {{ Auth::user()->name }}"> 

                        <!-- Información del usuario -->
                        <div>
                            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
   
                            <div class="mt-2 flex space-x-4">
                                <div class="flex items-center">
                                    <span class="font-semibold">{{ $user->tweets_count }}</span>
                                    <span class="ml-1 text-gray-400">Tweets</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="font-semibold">{{ $user->followers_count }}</span>
                                    <span class="ml-1 text-gray-400">Seguidores</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de modificar perfil -->
                    <a href="{{ route('profile') }}" 
                        class="inline-flex items-center px-4 py-2 bg-transparent border border-blue-500 rounded-full font-semibold text-blue-500 hover:bg-blue-500/10 transition-colors duration-200">
                        Modificar perfil
                    </a>
                </div>

                <!-- Biografía -->
                @if(Auth::user()->bio)
                    <p class="mt-4 text-gray-300 leading-relaxed">
                        {{ Auth::user()->bio }}
                    </p>
                @endif

                <!-- Detalles adicionales -->
                <div class="mt-4 grid grid-cols-2 gap-4 text-gray-400">
                    @if(Auth::user()->location)
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ Auth::user()->location }}
                        </div>
                    @endif
                    
                    @if(Auth::user()->website)
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            <a href="{{ Auth::user()->website }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ parse_url(Auth::user()->website, PHP_URL_HOST) }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

           {{--  <!-- Sección de tweets (ejemplo) -->
            <div class="mt-8 space-y-4">
                @foreach($tweets as $tweet)
                    <div class="bg-[#192734] p-4 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <img src="{{ asset($tweet->user->profile_photo_path) }}" 
                                 class="h-12 w-12 rounded-full object-cover"
                                 alt="Foto de perfil de {{ $tweet->user->name }}">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2">
                                    <span class="font-bold">{{ $tweet->user->name }}</span>
                                    <span class="text-gray-400">@{{ $tweet->user->username }}</span>
                                    <span class="text-gray-400">·</span>
                                    <span class="text-gray-400">{{ $tweet->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mt-2">{{ $tweet->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
</div>

<style>
    /* Estilos personalizados */
    .bg-[#15202b] {
        background-color: #15202b;
    }
    .bg-[#192734] {
        background-color: #192734;
    }
</style>