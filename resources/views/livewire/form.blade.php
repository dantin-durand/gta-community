<div>
    <form method="post" class="mb-4 col-12 form-post" wire:submit.prevent="createPost">
        <div class="profile-post mb-3">
            <img class="profile-picture-post" src="{{ auth()->user()->imageUrl }}" alt="" />
            <div>
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>
        @csrf

        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="3" class="form-control @error('body') is-invalid @enderror" wire:model="body" placeholder="Nouveau poste..."></textarea>
            @error('body')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn rounded-pill bg-default-theme">Créer un poste</button>
    </form>
</div>