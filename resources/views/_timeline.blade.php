<div class="border border-gray-300 rounded-lg py-4 px-6">
    @forelse ($tweets as $tweet)
        @include('_tweet')
        @empty
        <p class="p-4">No tienes tweets</p>
    @endforelse
    {{ $tweets->links() }}
</div>