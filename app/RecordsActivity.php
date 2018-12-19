<?php
/**
 * Created by PhpStorm.
 * User: dateng
 * Date: 17/12/18
 * Time: 9:57 PM
 */

namespace App;


use PhpParser\Builder;

trait RecordsActivity
{
    protected static function bootRecordsActivity()
    {
        foreach (self::getRecordTypes() as $event){
            self::$event(function($model) use ($event){
                $model->recordActivity($event);
            });
        }


    }

    protected function recordActivity($event)
    {
        Activity::$event([
            'user_id' => auth()->id(),
            'type' => $event . strtolower(class_basename($this)),
        ]);
    }

    protected static function getRecordTypes()
    {
        return ['created'];
    }
    public function activities()
    {
        return $this->morphMany('App\Activity', 'subject');
    }
}