<?php

namespace App\Livewire\System\Jcps;

use Livewire\Component;
use App\Models\Audit\jcp;
use App\Models\Audit\prerequisite;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use App\Models\User;
class JcpDetailsForm extends Component
{

    public $user_id = '';
    public $position_title = '';
    public $duty_station = '';
    public $job_grade = '';
    public $job_purpose = '';
    public $is_active = '';
    public $jcp_qualifications = [];

    public $jcp_prerequisites = [];




    public function createJCPInformation()
    {
        $this->save();
    }

    public function save()
    {
        $this->validateForm();
        // Create a new JCP

        $jcp = JCP::create([

            'position_title' => $this->position_title,
            'duty_station' => $this->duty_station,
            'user_id' => $this->user_id,
            'job_grade' => $this->job_grade,
            'job_purpose' => $this->job_purpose,
            'is_active' => $this->is_active,

        ]);


        // Attach qualifications
        $jcp->qualifications()->sync($this->jcp_qualifications);


        // Attach prerequisites
         $jcp->prerequisites()->sync($this->jcp_prerequisites);



        $this->reset();

        return redirect()->route('jcp.index')->with('success','JCP successfully created.');
    }


    public function validateForm()
    {
        $this->validate([

            'position_title' => 'required|string|max:255',

            'duty_station' => 'required|string|max:255',

            'user_id' => 'required|exists:users,id',

            'job_grade' => 'required|string',

            'job_purpose' => 'required|string',

            'is_active' => 'boolean',

            'jcp_qualifications' => 'required|array',

            'jcp_qualifications.*' => 'exists:qualifications,id', // Validate each qualification

            // Add other validations as necessary

        ]);

    }
    public function render()
    {
        return view('livewire.system.jcps.jcp-details-form', [
            'qualifications' => Qualification::all(),
            'users' => User::get(['id', 'first_name', 'last_name']),
            'prerequisites' => Prerequisite::all(),
        ]);
    }
}
