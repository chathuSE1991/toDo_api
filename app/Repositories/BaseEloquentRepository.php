<?php

namespace App\Repositories;

use App\Interfaces\BaseEloquentRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class BaseRepository.
 *
 */
class BaseEloquentRepository implements BaseEloquentRepositoryInterface
{
    protected $model;

    public function allPaginate(array $columns = [], array $relations = [], array $pluck = [] , array $filter = [] , $orderBy = '', $sort = '', $paged = 25)
    {
        $query = $this->model::query();

        if (!empty($relations)) {
            $query->with($relations);
        }

        if (!empty($filter)) {
             $query->where($filter);
        }

        if (!empty($columns)) {
            return $query->get($columns);
        }

        if (!empty($pluck)) {
            return $query->get()->{$pluck['method']}($pluck['first'], $pluck['second'])->toArray();
        }

        if(!empty($orderBy) && !empty($sort)){
            return $query->orderBy($orderBy, $sort)->paginate($paged);
        }else{
            return $query->orderBy('created_at', 'DESC')->paginate($paged);
        }
    }

    public function allList(array $columns = [], array $relations = [], array $pluck = [] , array $filter = [] , $orderBy = '' , $sort = '')
    {
        $query = $this->model::query();

        if (!empty($relations)) {
            $query->with($relations);
        }

        if (!empty($filter)) {
             $query->where($filter);
        }

        if (!empty($columns)) {
            return $query->get($columns);
        }

        if (!empty($pluck)) {
            return $query->get()->{$pluck['method']}($pluck['first'], $pluck['second'])->toArray();
        }

        if(!empty($orderBy) && !empty($sort)){
            return $query->orderBy($orderBy, $sort)->get();
        }else{
            return $query->orderBy('created_at', 'DESC')->get();
        }
    }

    public function find(int $ID, array $columns = null , array $relations = [])
    {
        if (!empty($relations)) {
            return $this->model::with($relations)->find($ID);
        }else{
            return $this->model::find($ID);
        }
    }

    public function store(array $item)
    {
        return $this->model::create($item);
    }

    public function storeGetId(array $item){

        return $this->model::insertGetId($item);
    }

    public function update(int $ID, array $data)
    {
        $item = $this->find($ID);

        if ($item) {
            return $item->update($data);
        }

        return null;
    }

    public function delete(int $ID)
    {
        if (intval($ID) > 0) {
            return $this->model::destroy($ID);
        }

        return null;
    }

    public function deleteBy(array $criteria)
    {
        return $this->model::where($criteria)->delete();
    }

    public function findBy(array $criteria, array $columns = [], bool $single = true , $relations = [])
    {
        $query = $this->model::query();

        if (!empty($relations)) {
            $query->with($relations);
        }

        foreach ($criteria as $key => $item) {
            if (is_array($item)) {
                list($field, $condition, $val) = $item;
                $query->where($field, $condition, $val);
            }
            else{
                $query->where($key, $item);
            }
        }

        $method = $single ? 'first' : 'get';

        return empty($columns) ? $query->{$method}() : $query->{$method}($columns);
    }

    public function findByLimit($limit,array $criteria, array $columns = [], bool $single = true , $relations = [])
    {
        $query = $this->model::query();

        if (!empty($relations)) {
            $query->with($relations);
        }

        foreach ($criteria as $key => $item) {
            if (is_array($item)) {
                list($field, $condition, $val) = $item;
                $query->where($field, $condition, $val)->limit($limit);
            }
            else{
                $query->where($key, $item)->limit($limit);
            }
        }

        $method = $single ? 'first' : 'get';

        return empty($columns) ? $query->{$method}() : $query->{$method}($columns);
    }

    public function updateBy(array $criteria, array $data)
    {
        $query = $this->model::query();

        foreach ($criteria as $key => $value) {
            $query->where($key, $value);
        }

        return $query->update($data);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $query = $this->model::query();
        return $query->paginate($perPage, $columns, $pageName, $page);
    }

    public function pluckBy(array $criteria, array $columns = [], bool $single = true , $relations = [] , $pluck = [])
    {
        $query = $this->model::query();

        if (!empty($relations)) {
            $query->with($relations);
        }

        foreach ($criteria as $key => $item) {
            if (is_array($item)) {
                list($field, $condition, $val) = $item;
                $query->where($field, $condition, $val);
            }
            else{
                $query->where($key, $item);
            }
        }

        $method = $single ? 'first' : 'get';

        return empty($columns) ? $query->{$method}() : $query->{$method}($columns)->pluck($pluck);
    }

    /**
	 * Count the number of specified model records in the database
	 *
	 * @return int
	 */
	public function count()
	{
		return $this->get()->count();
	}
}
