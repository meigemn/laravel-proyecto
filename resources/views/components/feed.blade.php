
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    @if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    
@endif
    
    @foreach($tweets as $tweet)
        <x-tweet-component :tweet="$tweet" />
    @endforeach

    <!-- Mostrar links de paginación -->
    <div class="mt-6">
        {{ $tweets->links() }}
    </div>
</div>