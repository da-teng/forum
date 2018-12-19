<?php

namespace App\Filters;


use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ThreadFilter extends Filter
{

    /**
     * @param Builder $builder
     * @param $username
     * @return Builder
     */
    protected $filters = ['by', 'popular'];
    public function by($username)
    {
//        dd('aaa');
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

    public function popular(){
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }

}