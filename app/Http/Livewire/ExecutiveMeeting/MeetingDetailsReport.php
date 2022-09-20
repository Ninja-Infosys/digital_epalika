<?php

namespace App\Http\Livewire\ExecutiveMeeting;

use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\OfficeSetting;
use Livewire\Component;

class MeetingDetailsReport extends Component
{
    public $meetingDetails = [];
    public $officeSetting;
    public $from_date;
    public $to_date;

    public function mount($model_type)
    {
        $this->meetingDetails = MeetingDetail::where('model_type', $model_type)->latest()->get();

        $this->officeSetting = OfficeSetting::with('province', 'district', 'localBody')->first();
    }

    public function render()
    {
        return view('livewire.executive-meeting.meeting-details-report');
    }
}
