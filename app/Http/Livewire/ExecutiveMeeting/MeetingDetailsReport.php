<?php

namespace App\Http\Livewire\ExecutiveMeeting;

use App\Models\Settings\OfficeSetting;
use Livewire\Component;
use Modules\ExecutiveMeeting\Entities\MeetingDetail;

class MeetingDetailsReport extends Component
{
    public $meetingDetails = [];
    public $officeSetting;
    public $from_date;
    public $to_date;
    public $model_type;

    public function mount($model_type)
    {
        $this->model_type = $model_type;

        $this->meetingDetails = MeetingDetail::where('model_type', $model_type)->latest()->get();

        $this->officeSetting = OfficeSetting::with('province', 'district', 'localBody')->first();
    }

    public function render()
    {
        $this->meetingDetails = MeetingDetail::where('model_type', $this->model_type)->latest()
            ->where(function ($query) {
                if (!empty($this->from_date)) {
                    $query->whereDate('meeting_date', '>=', $this->from_date);
                }
                if (!empty($this->to_date)) {
                    $query->whereDate('meeting_date', '<=', $this->to_date);
                }
            })
            ->latest()
            ->get();

        return view('livewire.executive-meeting.meeting-details-report');
    }
}
