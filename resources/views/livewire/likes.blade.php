<div>
    <span>{{ $count }}</span>
    @if (!$hasUserLiked)
    <button wire:click="addLike" class="like-btn"><i class="far fa-thumbs-up"></i></button>
    @else
    <button wire:click="removeLike" class="like-btn"><i class="fas fa-thumbs-up"></i></button>
    @endif
</div>