<?php

namespace App\Services;

abstract class Service
{
    public function all()
    {
        return $this->repository->all();
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function first()
    {
        return $this->repository->first();
    }

    public function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function findByParam($column, $data)
    {
        return $this->repository->findByParam($column, $data);
    }

    public function save(array $data, $id = null)
    {
        return $this->repository->save($data, $id);
    }

    public function update(array $data, string $field, $value)
    {
        return $this->repository->update($data, $field, $value);
    }

    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }
}
