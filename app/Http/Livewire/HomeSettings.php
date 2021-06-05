<?php

namespace App\Http\Livewire;

use App\Models\Library;
use App\Models\SocialMedia;
use Livewire\Component;

class HomeSettings extends Component
{
    public $facebook_link;
    public $linkedIn_link;
    public $twitter_link;
    public $email_link;
    public $phone1;
    public $phone2;
    public $lib_name;
    public $lib_desc;
    public $hero_image_title;
    public $hero_image_desc;
    public $old_logo;
    public $old_favicon;
    public $logo;
    public $favicon;

    
    public function UpdateHomeSettings(){
        dd();
        $this->validate([
            'email_link' => ['required', 'string', 'max:255'],
            'phone1' => ['required'],
            'lib_name' => ['required'],
            'hero_image_title' => ['required'],
            'hero_image_desc' => ['required']
        ]);

        Library::find(1)->update([
            'lib_name' => $this->lib_name,
            'lib_desc' => $this->lib_desc,
            'lib_email' => $this->email_link,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'hero_image_title' => $this->hero_image_title,   
            'hero_image_desc' => $this->hero_image_desc,
        ]);

        SocialMedia::find(1)->update([
            'url' => $this->facebook_link,
        ]);
        
        SocialMedia::find(2)->update([
            'url' => $this->linkedIn_link,
        ]);

        SocialMedia::find(3)->update([
            'url' => $this->twitter_link,
        ]);
        

    }

    
    public function render()
    {
        return view('livewire.home-settings');
    }
}
