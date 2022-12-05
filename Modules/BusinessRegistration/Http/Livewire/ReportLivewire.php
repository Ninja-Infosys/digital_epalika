<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Settings\FiscalYear;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\Introboard;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class ReportLivewire extends Component
{
    public $businessDetails = [];
    public $fiscalYears = [];
    public $businessPurposes = [];
    public $objectTransactions = [];
    public $investmentRevenues = [];
    public $businessYears = [];

    public array $form = [
        'date' => [
            'from_date' => null,
            'to_date' => null,
        ],
        'fiscal_year' => [],
        'business_nature' => [],
        'business_purpose' => [],
        'object_transaction' => [],
        'investment_revenue' => [],
        'registration_renewal' => [],
        'investment' => [],
        'employment' => [],
        'business_year' => [],
        'introBoard' => [],
    ];
    public bool $showForm = false;

    protected $rules = [
        'form.date.from_date' => ['nullable', 'date', 'before_or_equal:form.date.to_date'],
        'form.date.to_date' => ['nullable', 'date', 'after_or_equal:form.date.from_date']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {

        $this->fiscalYears = FiscalYear::get();
        $this->businessPurposes = BusinessPurpose::get();
        $this->objectTransactions = ObjectTransaction::get();
        $this->investmentRevenues = InvestmentRevenue::get();
        $this->setBusinessYear();
        $this->setFromData();
    }

    protected $listeners = ['fromDateChanged', 'toDateChanged'];

    public function fromDateChanged($nepaliDate, $englishDate): void
    {
        $this->form['date']['from_date'] = $nepaliDate;
    }

    public function toDateChanged($nepaliDate, $englishDate): void
    {
        $this->form['date']['to_date'] = $nepaliDate;
    }

    public function submitForm(): void
    {
        $this->validate();
        $this->businessDetails = BusinessDetail::with('proprietorDetail', 'localBody')
            ->where(function ($q) {
                if (!empty($this->form['date']['from'])) {
                    $q->whereDate('registration_date_ne', '<=', $this->form['date']['from']);
                }
                if (!empty($this->form['date']['to'])) {
                    $q->whereDate('registration_date_ne', '>=', $this->form['date']['to']);
                }
            })
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('businessregistration::livewire.report-livewire');
    }

    public function showFilterForm()
    {
        $this->showForm = !$this->showForm;
    }

    /**
     * @return void
     */
    public function setBusinessYear(): void
    {
        $minYear = Carbon::create(BusinessDetail::select('establish_year')->min('establish_year'));
        $maxYear = Carbon::create(BusinessDetail::select('establish_year')->max('establish_year'));
        $range = CarbonPeriod::create($minYear, '1 year', $maxYear);

        foreach ($range as $year) {
            $this->businessYears[] = $year->year;
        }

    }

    /**
     * @return void
     */
    public function setFromData(): void
    {
        $this->form['investment'] = [
            'from' => 0,
            'to' => (int)BusinessDetail::select('amount_cost')->max('amount_cost')
        ];

        $this->form['employment'] = [
            'from' => 0,
            'to' => (int)BusinessDetail::select('employment')->max('employment')
        ];

        $this->form['introBoard'] = [
            'from' => 0,
            'to' => (int)Introboard::select('square')->max('square'),
        ];
    }
}
