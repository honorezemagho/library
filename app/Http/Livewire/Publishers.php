<?php

namespace App\Http\Livewire;

use App\Models\Publisher;
use Livewire\Component;

class Publishers extends Component
{
    public $name;
    public $description;
    public $publisher_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreatePublisherModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storePublisher()
    {
        $this->validate([
          'name' =>'required'
      ]);
        $role = Publisher::create(['name' => $this->name]);
        $this->reset();
       
        //session()->flash('flash.banner', 'Publisher created Successfully');
    }
    public function updatePublisher()
    {
        $this->validate([
          'name' =>'required',
      ]);

        Publisher::find($this->publisher_id)->update([
             'name' => $this->name,
             'description' => $this->description
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditAuthorModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->publisher_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $publisher = Publisher::findOrFail($this->publisher_id);
        $this->name = $publisher->name;
        $this->description = $publisher->description;
    }

    public function showDeleteAuthorModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->publisher_id = $id;
    }

    public function deleteAuthor($id)
    {
        $role = Publisher::find($id);
        $role->delete();
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Publisher'. $role->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.publishers', ['publishers' => Publisher::all()]);
    }
}
