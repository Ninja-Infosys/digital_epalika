<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Identity\Entities\SeniorCitizenDetail;

class SeniorCitizenDetailReportLivewire extends Component
{
    public $fiscalYears = [];
    public $fiscal_year;
    public $from_date;
    public $from_date_en;
    public $to_date;
    public $to_date_en;
    public $seniorCitizenReports = [];

    public function mount()
    {
        $this->fiscalYears = FiscalYear::all();
    }

    protected $listeners = ['fromDateChanged', 'toDateChanged'];

    public function fromDateChanged($nepaliDate, $englishDate)
    {

        $this->from_date = $nepaliDate;
        $this->from_date_en = $englishDate;

    }

    public function toDateChanged($nepaliDate, $englishDate)
    {
        $this->to_date = $nepaliDate;
        $this->to_date_en = $englishDate;

    }

    public function save()
    {
        $this->seniorCitizenReports = SeniorCitizenDetail::with('province', 'district', 'localBody')->where(function ($query) {
            if (!empty($this->fiscal_year)) {
                $query->where('fiscal_year_id', $this->fiscal_year);
            }
            if (!empty($this->from_date_en)) {
                $query->orWhereDate('created_at', '>=', $this->from_date_en);
            }
            if (!empty($this->to_date_en)) {
                $query->orWhereDate('created_at', '<=', $this->to_date_en);
            }
        })
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('identity::livewire.senior-citizen-detail-report-livewire');
    }
}
