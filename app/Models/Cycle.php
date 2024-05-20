<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cycle
 *
 * @property $CodeCycle
 * @property $LibelleCycle
 * @property $isWritable
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cycle extends Model
{

    protected $perPage = 20;
    protected $primaryKey = 'CodeCycle';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeCycle', 'LibelleCycle', 'isWritable'];
}
