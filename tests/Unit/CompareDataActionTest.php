<?php

use App\Actions\CompareDataAction;

beforeEach(function () {
    $recentData = [
        [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
        ],

        [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '04-abr-18',
        ],
    ];

    $oldData = [
        [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
        ],

        [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '05-abr-18',
        ],
    ];

    $this->comparison = (new CompareDataAction)->compare(
        oldData: $oldData,
        recentData: $recentData
    );
});

it('expects equals when we repeat a line in the recent data', function () {
    expect(array_key_exists('802000100||DODF_2019_5_31_561060_2018.pdf||31-mai-19', $this->comparison['equals']))->toBeTrue();
});

it('expects new when we create a line in the recent data', function () {
    expect(array_key_exists('17734000183||DOSC_2018_4_4_542126_2017.pdf||04-abr-18', $this->comparison['new']))->toBeTrue();
});

it('expects updated when we changed a line in the recent data', function () {
    expect(array_key_exists('17734000183||DOSC_2018_4_4_542126_2017.pdf||05-abr-18', $this->comparison['updated']))->toBeTrue();
});
