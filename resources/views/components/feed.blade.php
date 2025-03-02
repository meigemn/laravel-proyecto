
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    @foreach($tweets as $tweet)
        <x-tweet-component :tweet="$tweet" />
    @endforeach

    <!-- Mostrar links de paginación -->
    <div class="mt-6">
        {{ $tweets->links() }}
    </div>
</div>