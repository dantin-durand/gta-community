<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\HashedPasswordCheck;
use App\Rules\ExistingUsernameCheck;
use App\Rules\ExistingEmailCheck;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{

    use WithFileUploads;

    public $username;
    public $imageUrl;
    public $oldPassword;
    public $newPassword;
    public $userEmail;

    public $userCreatedAt;
    public $image;
    public $defaultImage;
    public $editMode = false;
    public $user;

    public function toggleEditMode()
    {
        $this->editMode = !$this->editMode;
    }

    public function removeImageUrl()
    {
        $this->imageUrl = $this->defaultImage;
        User::where('id', $this->user->id)
            ->update([
                'imageUrl' => $this->defaultImage,
            ]);
    }

    public function mount()
    {

        $fetchedUser = User::where('id', auth()->user()->id)->first();

        $this->user = $fetchedUser;
        $this->defaultImage = env('DEFAULT_AVATAR');
        $this->username = $this->user->name;
        $this->imageUrl = $this->user->imageUrl;
        $this->userEmail = $this->user->email;
        $this->userCreatedAt = date_format($this->user->created_at, "d-m-Y");
    }

    public function submitForm(Request $request)
    {
        $this->validate([
            'username' => [
                'required',
                'min:6',
                new ExistingUsernameCheck(),
            ],
            'imageUrl' => 'max:1024',
            'oldPassword' => [
                'required',
                'min:8',
                new HashedPasswordCheck(),
            ],
            'newPassword' => 'required|min:8|different:oldPassword',
            'userEmail' => [
                'required',
                'email',
                new ExistingEmailCheck(),
            ],
        ]);

        $this->toggleEditMode();

        if ($this->image) {

            $uploadedFileUrl = Cloudinary::upload($this->image->getRealPath())->getSecurePath();
            $this->imageUrl = $uploadedFileUrl;
        }
        User::where('id', $this->user->id)
            ->update([
                'name' => $this->username,
                'imageUrl' => $this->imageUrl,
                'password' => Hash::make($this->newPassword),
                'email' => $this->userEmail,
            ]);


        // dd($this->imageUrl->temporaryUrl());

        // if ($request->imageUrl) {

        //     //$this->imageUrl->storeAs('photos', 'avatar');
        // };

        session()->flash('success', 'Vos paramètres utilisateur ont mis à jour');
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }


    public function render()
    {
        return view('livewire.settings');
    }
}
