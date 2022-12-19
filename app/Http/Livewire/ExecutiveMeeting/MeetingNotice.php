<?php

namespace App\Http\Livewire\ExecutiveMeeting;

use Livewire\Component;

class MeetingNotice extends Component
{
    public $type;
    public $meeting_at;

    public function mount($meetingNotice = null)
    {
        if (!empty($meetingNotice)) {
            $this->type = $meetingNotice->type;
            $this->meeting_at = $meetingNotice->meeting_at;
        }
    }

    public function render()
    {
        return view('livewire.executive-meeting.meeting-notice');
    }
}
