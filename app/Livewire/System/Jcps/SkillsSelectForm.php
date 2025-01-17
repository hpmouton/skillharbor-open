<?php

namespace App\Livewire\System\Jcps;

use App\Models\Audit\skill;
use Livewire\Component;

class SkillsSelectForm extends Component
{
    public $jcp_skills = [];
    public function mount()
    {
        $this->jcp_skills = [
            ['skill_id' => '', 'required_rating' => 1],
        ];
    }

    public function addSkill()
    {
        $this->jcp_skills[] = ['skill_id' => '', 'required_rating' => 1];
    }


    public function removeSkill($index)
    {
        unset($this->jcp_skills[$index]);
        $this->jcp_skills = array_values($this->jcp_skills); // Reindex the array
    }



    public function render()
    {
        return view('livewire.system.jcps.skills-select-form',['skills' => skill::all()]);
    }
}
