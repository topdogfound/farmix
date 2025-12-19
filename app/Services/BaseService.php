<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Throwable;

abstract class BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /* -----------------------------------------
        Generic CRUD
    ----------------------------------------- */

    public function getAll(array $columns = ['*'])
    {
        return $this->safeExecute(
            fn() => $this->repository->all($columns),
            'Failed fetching all records'
        );
    }
    public function list(array $columns = ['*'])
    {
        return $this->getAll($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->safeExecute(
            fn() => $this->repository->paginate($perPage, $columns),
            'Pagination failed'
        );
    }

    public function find(int|string $id, array $columns = ['*'])
    {
        return $this->safeExecute(
            fn() => $this->repository->findOrFail($id, $columns),
            "Record not found: {$id}"
        );
    }

    public function create(array $data)
    {
        return $this->safeExecute(
            fn() => $this->repository->create($data),
            'Create failed'
        );
    }

    public function update(int|string $id, array $data)
    {
        return $this->safeExecute(
            fn() => $this->repository->update($id, $data),
            "Update failed for ID {$id}"
        );
    }

    public function delete(int|string $id)
    {
        return $this->safeExecute(
            fn() => $this->repository->delete($id),
            "Delete failed for ID {$id}"
        );
    }

    /* -----------------------------------------
        Wrapper for business logic with DB transactions
    ----------------------------------------- */

    public function transaction(callable $callback)
    {
        return $this->safeExecute(
            fn() => $this->repository->transaction($callback),
            'Transaction failed'
        );
    }

    /* -----------------------------------------
        Centralized Error Handler
    ----------------------------------------- */

    protected function safeExecute(callable $callback, string $context)
    {
        try {
            return $callback();
        } catch (Throwable $e) {
            Log::error($context, ['error' => $e->getMessage()]);
            throw $e; // Let controller transform to API response
        }
    }
}
