<?php

use App\Actions\CompareDataAction;

beforeEach(function () {
    $recentData = [
        'DODF_2019_5_31_561060_2018.pdf' => [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
        ],

        'DOSC_2018_4_4_542126_2017.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '04-abr-18',
        ],

        'DOSC_2016_3_31_479021_2016.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2016_3_31_479021_2016.pdf',
            'balance_date' => '31-Mar-16',
        ],
    ];

    $oldData = [
        'DODF_2019_5_31_561060_2018.pdf' => [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
        ],

        'DOSC_2018_4_4_542126_2017.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '05-abr-18',
        ],

        'DOSC_2016_3_31_479021_2015.pdf' => [
          'cnpj' => '17734000183',
          'pdf_file_name' => 'DOSC_2016_3_31_479021_2015.pdf',
          'balance_date' => '31-Mar-16',
        ],
    ];

    $this->comparison = (new CompareDataAction)->compare(
        oldData: $oldData,
        recentData: $recentData
    );
});

it('expects equals for the file DODF_2019_5_31_561060_2018.pdf', function () {
    expect(isset($this->comparison['equals']['DODF_2019_5_31_561060_2018.pdf']))->toBeTrue();
});

it('expects new for the file DOSC_2016_3_31_479021_2016.pdf', function () {
    expect(isset($this->comparison['new']['DOSC_2016_3_31_479021_2016.pdf']))->toBeTrue();
});

it('expects updated for the file DOSC_2018_4_4_542126_2017.pdf', function () {
    expect(isset($this->comparison['updated']['DOSC_2018_4_4_542126_2017.pdf']))->toBeTrue();
});
