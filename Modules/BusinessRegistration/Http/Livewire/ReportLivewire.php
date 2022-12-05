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

    public function updated($propertyName): void
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

    public function fromDateChanged($nepaliDate): void
    {
        $this->form['date']['from_date'] = $nepaliDate;
    }

    public function toDateChanged($nepaliDate): void
    {
        $this->form['date']['to_date'] = $nepaliDate;
    }

    public function submitForm(): void
    {
//        dd($this->form);
        $this->validate();
        $this->businessDetails = BusinessDetail::with(['proprietorDetail',
            'localBody',
            'investmentRevenue',
            'proprietorDetail.introboard',
            'proprietorDetail'

        ])
            ->where(function ($q) {
                $this->filterDataFromUser($q);
            })
            ->get();

        $this->filterIntroBoardData();

        $this->filterObjectTransaction();

        $this->filterRegistrationRenewal();

    }

    public function render(): Factory|View|Application
    {
        return view('businessregistration::livewire.report-livewire');
    }

    public function showFilterForm(): void
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

    /**
     * @param $q
     * @return void
     */
    private function filterDataFromUser($q): void
    {
        if (!empty($this->form['date']['from']) && !empty($this->form['date']['to'])) {
            $q->whereDateBetween('registration_date_ne', [$this->form['date']['from'], $this->form['date']['to']]);
        }

        if (!empty($this->form['fiscal_year'])) {
            $q->whereIn('fiscal_year_id', $this->form['fiscal_year']);
        }

        if (!empty($this->form['business_nature'])) {
            $q->whereIn('business_nature', $this->form['business_nature']);
        }

        if (!empty($this->form['business_purpose'])) {
            $q->whereIn('investment_revenue_id', $this->form['business_purpose']);
        }

        if (!empty($this->form['investment_revenue'])) {
            $q->whereIn('investment_revenue_id', $this->form['investment_revenue']);
        }

        if (!empty($this->form['investment']['from'])) {
            $q->where('amount_cost', '>=', (int)$this->form['investment']['from']);
        }
        if ( !empty($this->form['investment']['to'])) {
            $q->where('amount_cost','<=',  (int)$this->form['investment']['to']);
        }

        if (!empty($this->form['employment']['from']) && !empty($this->form['employment']['to'])) {
            $q->whereBetween('employment', [$this->form['employment']['from'], $this->form['employment']['to']]);
        }

        if (!empty($this->form['business_year']['from']) && !empty($this->form['business_year']['to'])) {
            $q->whereBetween('establish_year', [$this->form['business_year']['from'], $this->form['business_year']['to']]);
        }
    }

    /**
     * @return void
     */
    private function filterIntroBoardData(): void
    {
        if (!empty($this->form['introBoard']['from']) && !empty($this->form['introBoard']['to'])) {
            $this->businessDetails = $this->businessDetails->filter(function ($detail) {
                if (!empty($detail->proprietorDetail)
                    && !empty($detail->proprietorDetail->introboard)) {
                    $square = (int)$detail->proprietorDetail->introboard->square;
                    return $this->form['introBoard']['from'] <= $square && $square <= $this->form['introBoard']['to'];
                }
                return false;
            });
        }
    }

    /**
     * @return void
     */
    private function filterObjectTransaction(): void
    {
        if (!empty($this->form['object_transaction'])) {
            $this->businessDetails = $this->businessDetails->filter(function ($detail) {
                if (!empty($detail->investmentRevenue)) {
                    $objectTransactionId = (int)$detail->investmentRevenue->object_transaction_id;
                    return in_array($objectTransactionId, $this->form['object_transaction'], true);
                }
                return false;
            });
        }
    }

    /**
     * @return void
     */
    private function filterRegistrationRenewal(): void
    {
        if (!empty($this->form['registration_renewal'])) {
            $this->businessDetails = $this->businessDetails->filter(function ($detail) {
                if (!empty($detail->proprietorDetail)) {
                    $businessType = (int)$detail->proprietorDetail->business_type;
                    return in_array($businessType, $this->form['registration_renewal'], true);
                }
                return false;
            });
        }
    }
}
