<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;
use App\Models\Field;
use App\Models\Level;
use App\Models\Period;
use App\Models\Subject;

class Subjects extends Component
{
    use WithFileUploads;

    public $subject_id;
    public $title;
    public $level;
    public $period;
    public $cover;
    public $url;
    public $new_url;
    public $field;
    public $author;
    public $academic_year;

    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateSubjectModal()
    {
        $this->showModalForm = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->showDeleteModalForm = false;
    }

    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storeSubject()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'url' => ['required','file', 'mimes:pdf', 'max:50000']
            ]);

        $cover_name = '';
        $url_name = '';
        if ($this->url) {
            $url_extension = $this->url->getClientOriginalExtension();
            $url_name = 'subjects'.'/'.Str::random(40).'.'.$url_extension;
            $this->url->storeAs('public/', $url_name);
            $url_name = 'storage/'.$url_name;

            if ($this->cover) {
                $cover_extension = $this->cover->getClientOriginalExtension();
                $cover_name = 'subjects'.'/'.Str::random(40).'.'.$cover_extension;
                $this->cover->storeAs('public/',  $cover_name);
            }else{
                //Path
                $base_path = base_path();
                $base_final_path = str_replace("\\", "/", $base_path);
                $cover_name = 'storage/subjects'.'/'.Str::random(40).'.png';

                $Imagick = new \Imagick();
                $Imagick->readImage($base_final_path.'/public'.'/'.$url_name.'[0]');
                $Imagick->setImageFormat('png');
                $Imagick->writeImage($base_final_path.'/public'.'/'.$cover_name);

            }

        }

        $subject = Subject::create([
            'title' => $this->title,
            'academic_year' => $this->academic_year,
            'url' => $url_name,
            'cover' => $cover_name,
            'level_id' => $this->level,
            'field_id' => $this->field,
            'period_id' => $this->period,
            'author_id' => $this->author,
        ]);

        $this->reset();

        //session()->flash('flash.banner', 'Subject created Successfully');
    }
    public function updateSubject()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required','file', 'mimes:pdf', 'max:50000']
            ]);


    $cover_name = '';
    $url_name = '';

    if ($this->url) {
        dd($this->new_url.'     '.$this->cover);
        Storage::delete('public/storage/', $this->new_url);
        Storage::delete('public/storage/', $this->cover);

        $url_extension = $this->url->getClientOriginalExtension();
        $url_name = 'subjects'.'/'.Str::random(40).'.'.$url_extension;
        $this->url->storeAs('public/', $url_name);
        $url_name = 'storage/'.$url_name;

        if ($this->cover) {
            $cover_extension = $this->cover->getClientOriginalExtension();
            $cover_name = 'subjects'.'/'.Str::random(40).'.'.$cover_extension;
            $this->cover->storeAs('public/',  $cover_name);
        }else{
            //Path
            $base_path = base_path();
            $base_final_path = str_replace("\\", "/", $base_path);
            $cover_name = 'storage/subjects'.'/'.Str::random(40).'.png';

            $Imagick = new \Imagick();
            $Imagick->readImage($base_final_path.'/public'.'/'.$url_name.'[0]');
            $Imagick->setImageFormat('png');
            $Imagick->writeImage($base_final_path.'/public'.'/'.$cover_name);

        }

    }

        Subject::find($this->subject_id)->update([
            'title' => $this->title,
            'academic_year' => $this->academic_year,
            'url' => $url_name,
            'cover' => $cover_name,
            'level_id' => $this->level,
            'field_id' => $this->field,
            'period_id' => $this->period,
            'author_id' => $this->author,

        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditSubjectModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->subject_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $subject = Subject::findOrFail($this->subject_id);
        $this->title =  $subject->title;
        $this->author =  $subject->author->id;
        $this->academic_year =  $subject->academic_year;
        $this->url = $subject->url;
        $this->cover = $subject->cover;
        $this->field = $subject->field->id;
        $this->period = $subject->period->id;
        $this->level = $subject->level->id;
    }

    public function showDeleteSubjectModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->subject_id = $id;
    }

    public function deleteSubject($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        Storage::delete('public/', $subject->url);
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Subject'. $subject->name.' Deleted Successfully');
    }

    public function render()
    {
        $subjects = Subject::with('field')->with('level')->with('period')->with('author')->get();
        $levels = Level::all();
        $authors = Author::all();
        $fields = Field::all();
        $periods = Period::all();
        return view('livewire.subjects', [
            'subjects' => $subjects,
            'authors' => $authors,
            'levels' => $levels,
            'fields' => $fields,
            'periods' => $periods
            ]);
    }
}
