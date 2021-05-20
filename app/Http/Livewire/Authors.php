<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;

class Authors extends Component
{
    public $name;
    public $description;
    public $author_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateAuthorModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storeAuthor()
    {
        $this->validate([
          'name' =>'required'
      ]);
        $role = Author::create(['name' => $this->name]);
        $this->reset();
       
        //session()->flash('flash.banner', 'Author created Successfully');
    }
    public function updateAuthor()
    {
        $this->validate([
          'name' =>'required',
      ]);

        Author::find($this->author_id)->update([
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
        $this->author_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $author = Author::findOrFail($this->author_id);
        $this->name = $author->name;
        $this->description = $author->description;
    }

    public function showDeleteAuthorModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->author_id = $id;
    }

    public function deleteAuthor($id)
    {
        $role = Author::find($id);
        $role->delete();
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Author'. $role->name.' Deleted Successfully');
    }

    public function render()
    {
        return view('livewire.authors', ['authors' => Author::all()]);
    }
}
