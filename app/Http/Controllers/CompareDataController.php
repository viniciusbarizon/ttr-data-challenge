<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use League\Csv\Reader;

class CompareDataController
{
    public function index(): View
    {
        return view('compare-data.index');
    }

    public function compare()
    {
        $oldFilePath = $this->getPath(inputName: 'old_data');
        $oldData = $this->getData($oldFilePath);

        $newFilePath = $this->getPath(inputName: 'new_data');
        $newData = $this->getData($newFilePath);

        // TODO: call action.
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
}
