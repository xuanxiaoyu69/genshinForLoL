<?php

namespace App\Admin\Repositories;

use App\Models\YRole as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class YRole extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
