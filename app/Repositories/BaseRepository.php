<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Exception;
use App\Repositories\Contracts\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /* -----------------------------------------
        Core CRUD
    ----------------------------------------- */

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->select($columns)->get();
    }

    public function paginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->model->select($columns)->paginate($perPage);
    }

    public function findById(int|string $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Model
    {
        $record = $this->findById($id, $columns);

        if (! $record) {
            throw new Exception("Record not found for ID: {$id}");
        }

        return $record;
    }

    public function create(array $data): Model
    {
        return $this->handle(fn () => $this->model->create($data), 'Create Failed');
    }

    public function update(int|string $id, array $data): Model
    {
        return $this->handle(function () use ($id, $data) {
            $record = $this->findOrFail($id);
            $record->update($data);
            return $record;
        }, 'Update Failed');
    }

    public function delete(int|string $id): bool
    {
        return $this->handle(function () use ($id) {
            $record = $this->findOrFail($id);
            return $record->delete();
        }, 'Delete Failed');
    }

    /* -----------------------------------------
        Query helpers
    ----------------------------------------- */

    public function firstWhere(array $conditions): ?Model
    {
        return $this->model->where($conditions)->first();
    }

    public function deleteWhere(array $conditions): int
    {
        return $this->handle(
            fn () => $this->model->where($conditions)->delete(),
            'Delete Where Failed'
        );
    }

    public function withRelations(array $relations)
    {
        return $this->model->with($relations);
    }

    public function filter(array $filters)
    {
        $query = $this->model->query();

        foreach ($filters as $key => $value) {
            if ($value !== null) {
                $query->where($key, $value);
            }
        }

        return $query->get();
    }

    /* -----------------------------------------
        Transactions
    ----------------------------------------- */

    public function transaction(callable $callback)
    {
        DB::beginTransaction();

        try {
            $result = $callback();
            DB::commit();
            return $result;

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Transaction Failed', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /* -----------------------------------------
        Centralized Error Handler
    ----------------------------------------- */

    protected function handle(callable $callback, string $context)
    {
        try {
            return $callback();
        } catch (Throwable $e) {
            Log::error($context, ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
