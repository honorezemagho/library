<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    public $name;
    public $guard_name;
    public $permission_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreatePermissionModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storePermission()
    {
        $this->validate([
          'name' =>'required'
      ]);
        $permission = Permission::create(['name' => $this->name]);
        $this->reset();
       
        //session()->flash('flash.banner', 'Permission created Successfully');
    }
    public function updatePermission()
    {
        $this->validate([
          'name' =>'required',
      ]);

        Permission::find($this->permission_id)->update([
             'name' => $this->name
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditPermissionModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->permission_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $permission = Permission::findOrFail($this->permission_id);
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
    }

    public function showDeletePermissionModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->permission_id = $id;
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Permission'. $permission->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.permissions', ['permissions' => Permission::all()]);
    }
}
