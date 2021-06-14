<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use phpDocumentor\Reflection\Types\This;

class Members extends Component
{

    use WithPagination;
    use PasswordValidationRules;
    use WithFileUploads;


    public $member_id;
    public $matricule;
    public $name;
    public $email;
    public $phone;
    public $country;
    public $city;
    public $date_of_birth;
    public $role;
    public $image;
    public $newImage;
    public $password;
    public $password_confirmation;

    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateMemberModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function closeModal()
    {
        $this->reset();
        $this->showDeleteModalForm = false;
    }

    public function storeMember()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => 'image|max:1024|nullable',
            'password' => $this->passwordRules(),
        ]);

        $url_image ="";
       if ($this->image) {
            $url_extension = $this->image->getClientOriginalExtension();
            $image_name = 'profile-photos'.'/'.Str::random(40);
            $image_name = $image_name.'.'.$url_extension;
            $url_image = 'storage/'. $image_name;
            $this->image->storeAs('public/', $image_name );
        }
        $member = User::create([
            'matricule' => $this->matricule,
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'profile_photo_url' => $url_image,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $member->assignRole($this->role);

        $this->reset();

        //session()->flash('flash.banner', 'Member created Successfully');
    }
    public function updateMember()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => 'image|max:1024|nullable',
            'password' => $this->passwordRules()
        ]);

      if ($this->image) {
        Storage::delete('public/profile-photos/', $this->newImage);
        $this->newImage = $this->image->getClientOriginalName();
        $this->image->storeAs('public/profile-photos/',Str::random(40));
    }

        User::find($this->member_id)->update([
            'matricule' => $this->matricule,
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'profile_photo_url' => $this->newImage

        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditMemberModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->member_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $member = User::findOrFail($this->member_id);
        $this->matricule =  $member->matricule;
        $this->name =  $member->name;
        $this->date_of_birth =  $member->date_of_birth;
        $this->email =  $member->email;
        $this->role = $member->getRoleNames();
        $this->newImage = $member->profile_photo_url;
    }

    public function showDeleteMemberModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->member_id = $id;
    }

    public function deleteMember($id)
    {
        $member = User::find($id);
        $member->delete();
        Storage::delete('public/profile-photos/', $member->image);
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Member'. $member->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.members',
        [
        'members' => User::role('Member')->with('roles')->get(),
        'roles' => Role::all()
        ]);
    }
}
