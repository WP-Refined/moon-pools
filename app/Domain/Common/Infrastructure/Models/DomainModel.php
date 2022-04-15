<?php

namespace App\Domain\Common\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    use HasFactory;

    /**
     * Override new factory instance creation for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        $calledClass = get_called_class();
        $factory = str_replace('\\Models\\', '\\Factories\\', $calledClass).'Factory';

        if (!class_exists($factory)) {
            throw new \RuntimeException(sprintf(
                'Unable to find matching Factory for model provided: %s',
                $calledClass
            ));
        }

        return $factory::new();
    }
}
