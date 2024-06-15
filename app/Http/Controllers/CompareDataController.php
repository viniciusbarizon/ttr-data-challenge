<?php

namespace App\Http\Controllers;

use App\Actions\CompareDataAction;
use App\Http\Requests\CompareDataRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use League\Csv\Reader;

class CompareDataController
{
    private array $comparison;
    private string $recentFilePath;
    private array $recentData;
    private string $oldFilePath;
    private array $oldData;

    public function index(): View
    {
        return view('compare-data.index');
    }

    public function compare(CompareDataRequest $request, CompareDataAction $action): RedirectResponse
    {
        $this->recentFilePath = $this->getPath(inputName: 'recent_data');
        $this->recentData = $this->getData(path: $this->recentFilePath);

        $this->oldFilePath = $this->getPath(inputName: 'old_data');
        $this->oldData = $this->getData(path: $this->oldFilePath);

        $this->comparison = $this->getComparison(action: $action);

        $this->log();

        return back()->with('comparison', $this->comparison);
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

    private function getComparison(CompareDataAction $action): array
    {
        return $action->compare(
            oldData: $this->oldData,
            recentData: $this->recentData
        );
    }

    private function log(): void
    {
        activity()
            ->byAnonymous()
            ->withProperties([
                'comparison' => $this->comparison,
                'ip' => request()->ip(),
                'recentFilePath' => $this->recentFilePath,
                'recentData' => $this->recentData,
                'oldFilePath' => $this->oldFilePath,
                'oldData' => $this->oldData,
            ])
            ->log('Compare Data');
    }
}
