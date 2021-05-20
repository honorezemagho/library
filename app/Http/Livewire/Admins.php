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

class Admins extends Component
{
   
    use WithPagination;
    use PasswordValidationRules;
    use WithFileUploads;
 

    public $admin_id;
    public $matricule;
    public $name;
    public $email;
    public $date_of_birth;
    public $role;
    public $image;  
    public $newImage;
    public $password;
    public $password_confirmation;

    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateAdminModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storeAdmin()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => 'required|image|max:1024',
            'password' => $this->passwordRules(),
        ]);

        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('public/profile-photos/', Str::random(40));
        $admin = User::create([
            'matricule' => $this->matricule,
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'profile_photo_url' => $image_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $admin->assignRole($this->role);

        $this->reset();
       
        //session()->flash('flash.banner', 'Admin created Successfully');
    }
    public function updateAdmin()
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
        $this->image->storeAs('public/profile-photos/', Str::random(40));
    }

        User::find($this->admin_id)->update([
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

    public function showEditAdminModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->admin_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $admin = User::findOrFail($this->admin_id);
        $this->matricule =  $admin->matricule;
        $this->name =  $admin->name;
        $this->date_of_birth =  $admin->date_of_birth;
        $this->email =  $admin->email;
        $this->role = $admin->getRoleNames();
        $this->newImage = $admin->profile_photo_url;
    }

    public function showDeleteAdminModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->admin_id = $id;
    }

    public function deleteAdmin($id)
    {
        $admin = User::find($id);
        $admin->delete();
        Storage::delete('public/profile-photos/', $admin->image);
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Admin'. $admin->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.admins',
        [
        'admins' => User::role('Admin')->with('roles')->get(),
         'roles' => Role::all()
        ]);
    }
}
