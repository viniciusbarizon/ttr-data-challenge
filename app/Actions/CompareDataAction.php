<?php

namespace App\Actions;

class CompareDataAction
{
    private array $comparison;
    private array $oldData;
    private array $recentData;

    public function compare(array $oldData, array $recentData): array
    {
        $this->oldData = $oldData;
        $this->recentData = $recentData;

        return $this->getComparison();
    }

    private function getComparison(): array
    {
        foreach ($this->recentData as $id => $data) {
            if ($this->isNew($id)) {
                $this->addToComparison(
                    data: $data,
                    id: $id,
                    type: 'new'
                );

                continue;
            }

            if ($this->isEqual($id, $data)) {
                $this->addToComparison(
                    data: $data,
                    id: $id,
                    type: 'equals'
                );

                continue;
            }

            $this->addToComparison(
                data: $data,
                id: $id,
                type: 'updated'
            );
        }

        return $this->comparison;
    }

    private function isNew(string $id): bool
    {
        return isset($this->oldData[$id]) === false;
    }

    private function addToComparison(array $data, string $id, string $type): void
    {
        $this->comparison[$type][$id] = $data;
    }

    private function isEqual(string $id, array $newData): bool
    {
        return $this->oldData[$id] === $newData;
    }
}
