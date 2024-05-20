<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiplomeDeBase
 *
 * @property $CodeDiplome
 * @property $LibelleDiplome
 * @property $CycleCible
 * @property $isWritable
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiplomeDeBase extends Model
{

    protected $perPage = 20;
    protected $primaryKey = 'CodeDiplome';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeDiplome', 'LibelleDiplome', 'CycleCible', 'isWritable'];
}
