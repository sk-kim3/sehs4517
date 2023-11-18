<?php

namespace App\Actions;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use App\Models\Post;
use App\Models\User;
use TCG\Voyager\Actions\AbstractAction;

class ExportAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Export Report';
    }

    public function getIcon()
    {
        return "voyager-receipt";
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning',
        ];
    }

    public function getDefaultRoute()
    {
        return '';
    }

    public function shouldActionDisplayOnDataType()
    {
        return in_array($this->dataType->slug, ['posts', 'pages']);
    }

    public function massAction($ids, $comingFrom)
    {
        $dataType = $this->dataType;

        switch ($dataType->slug) {
            case 'posts':
                $query = Post::select('id', 'title');
                if (!empty($selectedIds)) {
                    $query->whereIn('id', $ids);
                }
                $headers = ['id', 'title'];
                break;
            case 'pages':
                $query = User::select('id', 'name', 'email');
                if (!empty($selectedIds)) {
                    $query->whereIn('id', $ids);
                }
                $headers = ['id', 'name', 'email'];
                break;
        }
        $data = $query->get();
        $fileName = $dataType->slug . '.pdf';

        return Excel::download(new ReportExport($headers, $data), $fileName, \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
