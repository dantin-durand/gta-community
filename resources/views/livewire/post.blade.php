<div>

    <div class="profile-post">
        <img class="profile-picture-post" src="{{ $post->user->imageUrl }}" alt="" />
        <div>
            <p>{{ $post->user->name }}</p>
            <p class="time">{{ $createdAt }}</p>
        </div>
    </div>
    <div class="mt-3">
        {{ $post->body }}
    </div>
    <livewire:likes :post='$post' />
</div>