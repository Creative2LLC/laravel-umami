<?php

namespace Creative2\Umami\Classes\Abstract;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Creative2\Umami\Classes\Exceptions\MissingParameterException;

abstract class Resource
{
    private string $path;

    protected static function getRootPath(): string
    {
        return str(class_basename(static::class))->snake('-');
    }

    protected static function getDefaultData(): array
    {
        return [];
    }

    public function __construct()
    {
        $this->path = static::getRootPath();
    }

    protected function getPath(mixed ...$params): string
    {
        if (! empty($params)) {
            return $this->path.'/'.implode('/', $params);
        }

        return $this->path;
    }

    protected function getData(array $data, string $action): array
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

    private function formatDateTime(CarbonInterface|string|int $dateTime): int
    {
        if (is_numeric($dateTime)) {
            $dateTime = Carbon::parse($dateTime);
        }

        return $dateTime->getTimestampMs();
    }
}
