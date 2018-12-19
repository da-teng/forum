<?php
/**
 * Created by PhpStorm.
 * User: dateng
 * Date: 2/12/18
 * Time: 2:09 PM
 */

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{

    protected $request;
    protected $builder;

    protected $filters;
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function apply(Builder $builder)
    {
//        dd('a');
        $this->builder = $builder;
        foreach ($this->getFilters() as $filter => $value)
        {
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function getFilters()
    {

//        dd($this->request->only(['by', 'popular']));
        return $this->request->only($this->filters);
    }
}