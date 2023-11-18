<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    protected $headers;
    protected $data;

    public function __construct($headers, $data)
    {
        $this->headers = $headers;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('reports.table', [
            'headers' => $this->headers,
            'data' => $this->data
        ]);
    }
}
