<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class ReportLivewire extends Component
{
    public $businessDetails = [];
    public $fiscalYears = [];
    public $businessPurposes = [];
    public $objectTransactions = [];
    public $investmentRevenues = [];

    public array $form = [
        'from_date' => null,
        'to_date' => null,
        'fiscal_year' => null,
        'business_nature' => null,
        'business_purpose' => null,
        'object_transaction' => null,
        'investment_revenue' => null,
        'registration_renewal' => null,
        'investment' => null,
        'employment' => null,
        'business_year' => null,
        'introboard' => null,
    ];

    public function mount(): void
    {

        $this->fiscalYears = FiscalYear::get();
        $this->businessPurposes = BusinessPurpose::get();
        $this->objectTransactions = ObjectTransaction::get();
        $this->investmentRevenues = InvestmentRevenue::get();
    }

    protected $listeners = ['fromDateChanged', 'toDateChanged'];

    public function fromDateChanged($nepaliDate, $englishDate): void
    {
        $this->form['from_date'] = $nepaliDate;
    }

    public function toDateChanged($nepaliDate, $englishDate): void
    {
        $this->form['to_date'] = $nepaliDate;
    }

    public function submitForm(): void
    {
        $this->businessDetails = BusinessDetail::with('proprietorDetail', 'localBody')->filterData($this->form)->get();
    }

    public function render(): Factory|View|Application
    {
        return view('businessregistration::livewire.report-livewire');
    }
}
