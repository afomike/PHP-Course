<?php

declare(strict_types=1);

function paginate(
    array $items,
    int $page = 1,
    int $perPage = 5
): array {

    if ($page < 1 || $perPage < 1) {
        throw new InvalidArgumentException(
            "Page and per-page values must be positive."
        );
    }

    $totalItems = count($items);

    $totalPages = (int) ceil($totalItems / $perPage);

    $offset = ($page - 1) * $perPage;

    return [
        'data' => array_slice($items, $offset, $perPage),
        'current_page' => $page,
        'per_page' => $perPage,
        'total_items' => $totalItems,
        'total_pages' => $totalPages,
        'has_previous' => $page > 1,
        'has_next' => $page < $totalPages
    ];
}