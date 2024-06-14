<?php

namespace App\Actions;

class CompareDataAction
{
    private array $comparison;
    private array $newData;
    private array $oldData;

    public function compare(array $newData, array $oldData): array
    {
        $this->newData = $newData;
        $this->oldData = $oldData;

        return $this->getComparison();
    }

    private function getComparison(): array
    {
        foreach ($this->newData as $filename => $data) {
            if ($this->isNew($filename)) {
                $this->addToComparison(
                    filename: $filename,
                    newData: $data,
                    type: 'new'
                );

                continue;
            }

            if ($this->isEqual($filename, $data)) {
                $this->addToComparison(
                    filename: $filename,
                    newData: $data,
                    type: 'equals'
                );

                continue;
            }

            $this->addToComparison(
                filename: $filename,
                newData: $data,
                type: 'updated'
            );
        }

        return $this->comparison;
    }

    private function isNew(string $filename): bool
    {
        return isset($this->oldData[$filename]) === false;
    }

    private function addToComparison(string $filename, array $newData, string $type): void
    {
        $this->comparison[$type][$filename] = $newData;
    }

    private function isEqual(string $filename, array $newData): bool
    {
        return $this->oldData[$filename] === $newData;
    }
}
