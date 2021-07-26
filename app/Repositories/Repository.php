<?php

namespace App\Repositories;

abstract class Repository
{
    public function all()
    {
        return $this->model->all();
    }

    public function paginate()
    {
        return $this->model->paginate();
    }

    public function first()
    {
        return $this->model->first();
    }

    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findByParam($column, $data)
    {
        return $this->model->where($column, $data)
            ->first();
    }

    public function save(array $data, $id = null)
    {
        if (!$id) {

            return $this->model->create($data);
        }

        return $this->model->find($id)
            ->fill($data)
            ->save();
    }

    public function update(array $data, string $field, $value)
    {
        return $this->model->where($field, $value)
            ->update($data);
    }

    public function destroy(int $id)
    {
        return $this->model->find($id)
            ->delete();
    }
}
