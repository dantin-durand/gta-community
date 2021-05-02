<div class="col-12">

    <h4>Détails de l'utilisateur</h4>
    @if (!$editMode)
    <div class="user_recap p-4">
        <div class="d-flex flex-row-reverse">
            <button wire:click="toggleEditMode" class="btn text-light bg-default-theme modify fw-bold">Editer</button>
        </div>
        <p>
            <span>Avatar :</span><br>
            <img src="{{ $imageUrl }}" class="profile-picture-pres" />
            <button wire:click="removeImageUrl" class="btn text-danger modify fw-bold">Supprimer</button>
        </p>
        <p>
            <span>Pseudo : {{ $username }}</span>
        </p>


        <p>
            <span>Adresse mail : {{ $userEmail }}</span>
        </p>
        <p>
            <span>Créer le: {{ $userCreatedAt }}</span>
        </p>
    </div>
    @else
    <div class="user_settings p-2">
        <form wire:submit.prevent="submitForm" type="POST" class="d-flex flex-column" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mt-4">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input wire:model.defer="username" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                    @error('username')
                    <span class="text-red-500 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="imageUrl" class="col-md-4 col-form-label text-md-right">{{ __('Nouvel avatar') }}</label>

                <div class="col-12 col-md-6">
                    <input wire:model.defer="image" id="imageUrl" type="file" class="" name="imageUrl" value="{{ old('avatar') }}" autocomplete="avatar" autofocus>

                    @error('image')
                    <span class="text-red-500 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Ancien mot de passe') }}</label>

                <div class="col-md-6">
                    <input wire:model.defer="oldPassword" id="password" type="password" class="form-control" name="oldPassword" autocomplete="new-password">

                    @error('oldPassword')
                    <span class="text-red-500 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="password-new" class="col-md-4 col-form-label text-md-right">{{ __('Nouveau mot de passe') }}</label>

                <div class="col-md-6">
                    <input wire:model.defer="newPassword" id="password-new" type="password" class="form-control " name="password-new" autocomplete="new-password">

                    @error('newPassword')
                    <span class="text-red-500 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                <div class="col-md-6">
                    <input wire:model.defer="userEmail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('userEmail')
                    <span class="text-red-500 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0 mt-4">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn bg-default-theme fw-bold mb-4">
                        {{ __('Sauvegarder') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>