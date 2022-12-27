<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromView, WithProperties, ShouldAutoSize
{
    public function __construct(public $lists = [])
    {
    }
    public function view(): View
    {
        return view('report.table', [
            'lists' => $this->lists,
            'excelUrl' => null
        ]);
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Ninja Infosys',
            'lastModifiedBy' => config('app.name'),
            'title'          => 'Report Export',
            'description'    => 'Latest Report',
            'subject'        => 'Reports',
            'keywords'       => 'report,export,spreadsheet',
            'category'       => 'Reports',
            'manager'        => 'Ninja Infosys',
            'company'        => 'Ninja Infosys',
        ];
    }
}
