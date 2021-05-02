<div class="">

    @if(session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show toast-custom shadow bg-body rounded" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif



    @foreach ($posts as $post)
    <div class="post-container col-12 shadow p-3 mb-5 bg-body rounded">
        @if ($post->user->id === auth()->user()->id)
        <button wire:click="postRemove({{ $post }})" class="remove-post"><i class="fas fa-times"></i></button>
        @endif
        <livewire:post :post="$post" :key="$post->id" />

    </div>
    @endforeach
    {{ $posts->links('vendor.livewire.bootstrap') }}


</div>