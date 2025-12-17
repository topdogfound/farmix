<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoryInterface
{
    /* -----------------------------------------
        Core CRUD
    ----------------------------------------- */

    public function all(array $columns = ['*']): Collection;

    public function paginate(int $perPage = 15, array $columns = ['*']);

    public function findById(int|string $id, array $columns = ['*']): ?Model;

    public function findOrFail(int|string $id, array $columns = ['*']): Model;

    public function create(array $data): Model;

    public function update(int|string $id, array $data): Model;

    public function delete(int|string $id): bool;

    /* -----------------------------------------
        Query helpers
    ----------------------------------------- */

    public function firstWhere(array $conditions): ?Model;

    public function deleteWhere(array $conditions): int;

    public function withRelations(array $relations);

    public function filter(array $filters);

    /* -----------------------------------------
        Transactions
    ----------------------------------------- */

    public function transaction(callable $callback);
}
