<?php

namespace App\Core\Facades;

use Illuminate\Support\Facades\Log;
use App\Core\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema as FwSchema;

/**
 *
 */
class Schema extends FwSchema
{
    /**
     * Get a schema builder instance for a connection.
     *
     * @param  string|null  $name
     * @return Builder
     */
    public static function connection($name): Builder
    {

        /** @var \Illuminate\Database\Schema\Builder $builder */
        $builder = parent::connection($name);

        $builder->blueprintResolver(static function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
        return $builder;
    }
}
