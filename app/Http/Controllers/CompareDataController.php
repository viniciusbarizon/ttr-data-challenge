<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use League\Csv\Reader;

class CompareDataController
{
    private string $recentFilePath;
    private array $recentData;
    private string $oldFilePath;
    private array $oldData;

    public function index(): View
    {
        return view('compare-data.index');
    }

    public function compare(): View
    {
        $this->recentFilePath = $this->getPath(inputName: 'recent_data');
        $this->recentData = $this->getData(path: $this->recentFilePath);

        $this->oldFilePath = $this->getPath(inputName: 'old_data');
        $this->oldData = $this->getData(path: $this->oldFilePath);

        $this->log();

        dd('ok');

        // TODO: call action.

        return back()->with('comparison', $comparison);
    }

    private function getPath(string $inputName): string
    {
        return request()->file('old_data')
            ->storeAs('csv', time() . '.csv', 'public');
    }

    private function getData(string $path): array
    {
        $reader = Reader::createFromPath('storage/' . $path, 'r');
        $reader->setDelimiter(';');
        $reader->setHeaderOffset(0);

        $records = $reader->getRecords();

        foreach ($records as $record) {
            $data[$record['pdf_file_name']] = $record;
        }

        return $data;
    }

    private function log(): void
    {
        activity()
            ->byAnonymous()
            ->withProperties([
                'recentFilePath' => $this->recentFilePath,
                'recentData' => $this->recentData,
                'oldFilePath' => $this->oldFilePath,
                'oldData' => $this->oldData,
            ])
            ->log('Compare Data');
    }
}
