<?php

namespace App\Interfaces;

/**
 * Interface RepositoryContract.
 *
 */
interface BaseEloquentRepositoryInterface 
{
    public function allPaginate(array $columns = [], array $relations = [], array $pluck = [], array $filter = [], $orderBy = '', $sort = '', $paged = 25);

    public function allList(array $columns = [], array $relations = [], array $pluck = [] , array $filter = [] , $orderBy = '' , $sort = '');

    public function find(int $ID, array $columns = null, array $relations = []);

    public function store(array $item);

    public function update(int $ID, array $item);

    public function delete(int $ID);
    
    public function deleteBy(array $criteria);

    public function findBy(array $criteria, array $columns = [], bool $single = true);

    public function updateBy(array $criteria, array $data);

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    public function count();
}
