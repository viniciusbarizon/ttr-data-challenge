<?php

use App\Actions\CompareDataAction;

beforeEach(function () {
    $newData = [
        'DODF_2019_5_31_561060_2018.pdf' => [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
            'balance_refers_to_date' => '31-dez-18',
            'ativo_total' => 'R$ 163.979.827,09',
            'ativo_circulante' => 'R$ 155.279.290,81',
            'ativo_nao_circulante' => 'R$ 8.700.536,28',
            'passivo_total' => 'R$ 163.979.827,09',
            'passivo_circulante' => 'R$ 30.618.990,79',
            'passivo_nao_circulante' => 'R$ 0',
            'patrimonio_liquido' => 'R$ 133.360.836,3',
            'receita_liquida' => 'R$ 361.745.884,06',
            'lucro_bruto' => 'R$ 77.397.501,05',
        ],

        'DOSC_2018_4_4_542126_2017.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '04-abr-18',
            'balance_refers_to_date' => '31-dez-17',
            'ativo_total' => 'R$ 94.848.000',
            'ativo_circulante' => 'R$ 84.629.000',
            'ativo_nao_circulante' => 'R$ 10.219.000',
            'passivo_total' => 'R$ 94.848.000',
            'passivo_circulante' => 'R$ 76.327.000',
            'passivo_nao_circulante' => 'R$ 48.000',
            'patrimonio_liquido' => 'R$ 18.473.000',
            'receita_liquida' => 'R$ 266.888.000',
            'lucro_bruto' => 'R$ 19.400.000',
        ],

        'DOSC_2016_3_31_479021_2016.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2016_3_31_479021_2016.pdf',
            'balance_date' => '31-Mar-16',
            'balance_refers_to_date' => '31-dez-15',
            'ativo_total' => 'R$ 121.774.000',
            'ativo_circulante' => 'R$ 114.251.000',
            'ativo_nao_circulante' => 'R$ 7.523.000',
            'passivo_total' => 'R$ 121.774.000',
            'passivo_circulante' => 'R$ 96.126.000',
            'passivo_nao_circulante' => 'R$ 37.718.000',
            'patrimonio_liquido' => 'R$ -12.070.000',
            'receita_liquida' => 'R$ 314.824.000',
            'lucro_bruto' => 'R$ 9.938.000',
        ],
    ];

    $oldData = [
        'DODF_2019_5_31_561060_2018.pdf' => [
            'cnpj' => '802000100',
            'pdf_file_name' => 'DODF_2019_5_31_561060_2018.pdf',
            'balance_date' => '31-mai-19',
            'balance_refers_to_date' => '31-dez-18',
            'ativo_total' => 'R$ 163.979.827,09',
            'ativo_circulante' => 'R$ 155.279.290,81',
            'ativo_nao_circulante' => 'R$ 8.700.536,28',
            'passivo_total' => 'R$ 163.979.827,09',
            'passivo_circulante' => 'R$ 30.618.990,79',
            'passivo_nao_circulante' => 'R$ 0',
            'patrimonio_liquido' => 'R$ 133.360.836,3',
            'receita_liquida' => 'R$ 361.745.884,06',
            'lucro_bruto' => 'R$ 77.397.501,05',
        ],

        'DOSC_2018_4_4_542126_2017.pdf' => [
            'cnpj' => '17734000183',
            'pdf_file_name' => 'DOSC_2018_4_4_542126_2017.pdf',
            'balance_date' => '05-abr-18',
            'balance_refers_to_date' => '31-dez-17',
            'ativo_total' => 'R$ 94.848.000',
            'ativo_circulante' => 'R$ 84.629.000',
            'ativo_nao_circulante' => 'R$ 10.219.000',
            'passivo_total' => 'R$ 94.848.000',
            'passivo_circulante' => 'R$ 76.327.000',
            'passivo_nao_circulante' => 'R$ 48.000',
            'patrimonio_liquido' => 'R$ 18.473.000',
            'receita_liquida' => 'R$ 266.888.000',
            'lucro_bruto' => 'R$ 19.400.000',
        ],

        'DOSC_2016_3_31_479021_2015.pdf' => [
          'cnpj' => '17734000183',
          'pdf_file_name' => 'DOSC_2016_3_31_479021_2015.pdf',
          'balance_date' => '31-Mar-16',
          'balance_refers_to_date' => '31-dez-15',
          'ativo_total' => 'R$ 121.774.000',
          'ativo_circulante' => 'R$ 114.251.000',
          'ativo_nao_circulante' => 'R$ 7.523.000',
          'passivo_total' => 'R$ 121.774.000',
          'passivo_circulante' => 'R$ 96.126.000',
          'passivo_nao_circulante' => 'R$ 37.718.000',
          'patrimonio_liquido' => 'R$ -12.070.000',
          'receita_liquida' => 'R$ 314.824.000',
          'lucro_bruto' => 'R$ 9.938.000',
        ],
    ];

    $this->comparison = (new CompareDataAction)->compare(
        $newData,
        $oldData
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
