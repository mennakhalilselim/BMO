<div class="text-sm text-dark-400">
    posted by <a href="{{ route('profile.index', $post->user_id) }}">{{ $post->user->name }}</a>,
    {{ $post->created_at->diffForHumans() }}

    @unless ($post->created_at == $post->updated_at)
        <div>
            updated {{ $post->updated_at->diffForHumans() }}
        </div>
    @endunless
</div>