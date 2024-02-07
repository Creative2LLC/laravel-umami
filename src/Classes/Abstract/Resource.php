<?php

namespace Creative2\Umami\Classes\Abstract;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Creative2\Umami\Classes\Exceptions\MissingParameterException;
use Creative2\Umami\Contracts\ResourceInterface;
use Creative2\Umami\Facades\UmamiApi;

abstract class Resource implements ResourceInterface
{
    private string $path;

    protected static function getDefaultData(): array
    {
        return [];
    }

    public function __construct()
    {
        $this->path = strtolower(class_basename(static::class));
    }

    public function all(array $data = []): ?array
    {
        return UmamiApi::get($this->getPath(), $this->getData('all', $data))->json();
    }

    public function get(string $id): ?array
    {
        return UmamiApi::get($this->getPath($id))->json();
    }

    public function create(array $data): ?array
    {
        return UmamiApi::post($this->getPath(), $this->getData('create', $data))->json();
    }

    public function update(string $id, array $data): ?array
    {
        return UmamiApi::post($this->getPath($id), $this->getData('update', $data))->json();
    }

    public function delete(string $id): bool
    {
        return UmamiApi::delete($this->getPath($id))->successful();
    }

    protected function getPath(mixed ...$params): string
    {
        if (! empty($params)) {
            return $this->path.'/'.implode('/', $params);
        }

        return $this->path;
    }

    protected function getData(string $action, array $data): array
    {
        $sanitizedData = [
            ...static::getDefaultData()[$action] ?? [],
            ...$data,
        ];

        foreach (['startAt', 'endAt'] as $key) {
            if (! empty($sanitizedData[$key])) {
                $sanitizedData[$key] = $this->formatDateTime($sanitizedData[$key]);
            }
        }

        $nullKeys = array_keys($sanitizedData, null, true);

        if (! empty($nullKeys)) {
            throw new MissingParameterException($action, $nullKeys);
        }

        return $sanitizedData;
    }

    private function formatDateTime(string | CarbonInterface $dateTime): int
    {
        if (is_string($dateTime)) {
            $dateTime = Carbon::parse($dateTime);
        }

        return $dateTime->getTimestampMs();
    }
}
