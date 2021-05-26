<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;
use App\Models\AuthorWork;
use App\Models\Field;
use App\Models\Level;
use App\Models\Report;

class StudentReports extends Component
{
    use WithFileUploads;

    public $report_id;
    public $title;
    public $level;
    public $cover;
    public $url;
    public $new_url;
    public $field;
    public $author_1;
    public $author_2;
    public $academic_year;
    public $number_of_pages;

    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreateReportModal()
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

    public function storeReport()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_1' => ['required', 'string', 'max:255'],
            'url' => ['required','file', 'mimes:pdf','max:52288']
            ]);
        $cover_name = '';
        $url_name = '';
        if ($this->url) {
            $url_extension = $this->url->getClientOriginalExtension();
            $url_file_name = 'reports'.'/'.Str::random(40);
            $url_name = $url_file_name.'.'.$url_extension;
            $url_name = 'storage/'. $url_name;

            $this->url->storeAs('public/', $url_name);
            if ($this->cover) {
                $cover_extension = $this->cover->getClientOriginalExtension();
                $cover_name = 'reports'.'/'.Str::random(40).'.'.$cover_extension;
                $this->cover->storeAs('public/',  $cover_name);
            }else{
                //Path
                $base_path = base_path();
                $base_final_path = str_replace("\\", "/", $base_path);
                $cover_name = 'storage/reports'.'/'.Str::random(40).'.png';
        
                $Imagick = new \Imagick();
                $Imagick->readImage($base_final_path.'/public'.'/'.$url_name.'[0]');  
                $Imagick->setImageFormat('png');
                $Imagick->writeImage($base_final_path.'/public'.'/'.$cover_name);

            }
          
        }

        $report = Report::create([
            'title' => $this->title,
            'academic_year' => $this->academic_year,
            'cover' => $cover_name,
            'url' => $url_name,
            'level_id' => $this->level,
            'field_id' => $this->field,
        ]);
        
        if ($this->author_1) {
            AuthorWork::create([
                'author_work_id' => $report->id,
                'author_work_type' => Report::class,
                'author_id' => $this->author_1,
                'status'  => true,
             ]);
        }
        if ($this->author_2) {
            AuthorWork::create([
                'author_work_id' => $report->id,
                'author_work_type' => Report::class,
                'author_id' => $this->author_2,
                'status'  => false,
             ]);
        }
        
        //Author

        $this->reset();
       
        //session()->flash('flash.banner', 'Report created Successfully');
    }
    public function updateReport()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_1' => ['required', 'string', 'max:255'],
            'url' => ['required','file', 'mimes:pdf','max:52288']
            ]);

      if ($this->url) {
        Storage::delete('public/', $this->new_url);
        $this->new_url = 'reports'.'/'.Str::random(40).'.'.$this->url->getClientOriginalExtension();
        $this->url->storeAs('public/', $this->new_url);
    }

        Report::find($this->report_id)->update([
            'title' => $this->title,
            'academic_year' => $this->academic_year,
            'url' => $this->new_url,
            'level_id' => $this->level->id,
            'field_id' => $this->field->id,
      
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditReportModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->report_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $report = Report::findOrFail($this->report_id);
        $this->title =  $report->title;
        $this->number_of_pages =  $report->number_of_pages;
        $this->author_1 =  $report->author_1;
        $this->author_2 =  $report->author_2;
        $this->url = $report->url;
        $this->field = $report->field;
        $this->level = $report->level;
    }

    public function showDeleteReportModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->report_id = $id;
    }

    public function deleteReport($id)
    {
        $report = Report::find($id);
        $report->delete();
        Storage::delete('public/', $report->url);
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Report'. $report->name.' Deleted Successfully');
    }

    public function render()
    {
        $reports = Report::with('field')->with('level')->with('authors')->get();
        $authors = Author::all();
        $levels = Level::all();
        $fields = Field::all();
        return view('livewire.student-reports', [
            'reports' => $reports,
            'authors' => $authors,
            'levels' => $levels,
            'fields' => $fields
            ]);
    }
}
