<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $name;
    public $guard_name;
    public $role_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateRoleModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storeRole()
    {
        $this->validate([
          'name' =>'required'
      ]);
        $role = Role::create(['name' => $this->name]);
        $this->reset();
       
        //session()->flash('flash.banner', 'Role created Successfully');
    }
    public function updateRole()
    {
        $this->validate([
          'name' =>'required',
      ]);

        Role::find($this->role_id)->update([
             'name' => $this->name,
             'guard_name' => $this->guard_name
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditRoleModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->role_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $role = Role::findOrFail($this->role_id);
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
    }

    public function showDeleteRoleModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->role_id = $id;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Role'. $role->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.roles', ['roles' => Role::all()]);
    }
}
