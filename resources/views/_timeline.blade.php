<div class="mb-8">
    @forelse ($tweets as $tweet)
        @include('_tweet')
        @empty
        <p class="p-4">No tienes tweets</p>
    @endforelse
    {{ $tweets->links() }}
</div>