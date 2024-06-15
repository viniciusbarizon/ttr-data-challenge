<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public array $data;
    public array $filters;
    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $whom)
    {
        $this->data = session('comparison')[$whom];
        $this->filters = $this->getFilters();
        $this->title = ucfirst($whom);
    }

    private function getFilters(): array
    {
        return [
            'cnpj',
            'pdf_file_name',
            'balance_date',
            'balance_refers_to_date',
            'ativo_total',
            'ativo_circulante',
            'ativo_nao_circulante',
            'passivo_total',
            'passivo_circulante',
            'passivo_nao_circulante',
            'patrimonio_liquido',
            'receita_liquida',
            'lucro_bruto',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.table');
    }
}
