<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeFormulaire
 *
 * @property $CodeTypeFormulaire
 * @property $LibelleTypeFormulaire
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeFormulaire extends Model
{

    protected $perPage = 20;

    protected $primaryKey = 'CodeTypeFormulaire';
    public $incrementing = false;
    public $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeTypeFormulaire', 'LibelleTypeFormulaire'];
}
