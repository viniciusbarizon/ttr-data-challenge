<?php

namespace App\Actions;

class CompareDataAction
{
    private array $oldData;
    private array $oldDataFlip;
    private array $oldDataImploded;
    private array $recentData;
    private array $recentDataFlip;
    private array $recentDataImploded;

    public function compare(array $oldData, array $recentData): array
    {
        $this->oldData = $oldData;
        $this->recentData = $recentData;

        $this->recentDataImploded = $this->getDataImploded($this->recentData);
        $this->oldDataImploded = $this->getDataImploded($this->oldData);

        $this->recentDataFlip = array_flip($this->recentDataImploded);
        $this->oldDataFlip = array_flip($this->oldDataImploded);

        return $this->getComparison();
    }

    private function getDataImploded(array $data): array
    {
        return array_map(function($row) {
            return implode('||', $row);
        }, $data);
    }

    private function getComparison(): array
    {
        $new = array_diff_key($this->recentDataFlip, $this->oldDataFlip);
        $updated = array_diff_key($this->oldDataFlip, $this->recentDataFlip);

        return [
            'equals' => $this->getEquals(),
            'new' =>$new,
            'updated' => $updated,
        ];
    }

    private function getEquals(): array
    {
        $equals = array_intersect_key($this->recentDataFlip, $this->oldDataFlip);

        return $this->getDataExploded(data: $equals);
    }

    private function getDataExploded(array $data): array
    {
        $data = array_flip($data);

        return array_map(function($row) {
            return explode('||', $row);
        }, $data);
    }
}
