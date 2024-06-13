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
        $path = request()->file('old_data')
            ->storeAs('csv', time() . '.csv', 'public');

        $csv = Reader::createFromPath('storage/' . $path, 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        foreach ($records as $record) {
            $old[$record['cnpj']] = $record;
        }
        dd($old);

        /* $file = fopen(request()->file('old_data')->getRealPath(), 'r');
        $header = true;
        //dd($file);
        while (($line = fgetcsv($file, null, ';')) !== FALSE) {
            // skip the header.
            if ($header === true) {
                // remove the last item from header if empty.
                // example: aaa;bbb;ccc;
                if (empty(end($line))) {
                    array_pop($line);
                }

                $header = false;
                $numberOfColumns = count($line);

                continue;
            }

            // identifier of the line.
            $id = $line[0];

            // remove the identifier from array
            $test = array_slice($line, 1, $numberOfColumns - 1);

            $old[$id] = $test;
        }

        fclose($file);

        print("<pre>");
        print_r($old); */
    }
}
