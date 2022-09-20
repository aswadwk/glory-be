<?php

namespace App\Helpers;

use Throwable;
use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = (string) Str::uuid(); // generate uuid
                // Change id with your primary key
            } catch (Throwable $e) {
                abort(500, $e->getMessage());
            }
        });


    }
}