<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeChamp
 *
 * @property $CodeTypeChamp
 * @property $LibelleTypeChamp
 * @property $SpatieFunction
 * @property $ClassCSS
 * @property $SpatieAttributes
 * @property $CodeTypeSortie
 * @property $created_at
 * @property $updated_at
 *
 * @property TypeSorty $typeSorty
 * @property AttributTypeChamp[] $attributTypeChamps
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeChamp extends Model
{

    protected $perPage = 20;
    protected $primaryKey = 'CodeTypeChamp';
    public $incrementing = false;
    public $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['CodeTypeChamp', 'LibelleTypeChamp', 'SpatieFunction', 'ClassCSS', 'SpatieAttributes', 'CodeTypeSortie'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeSorty()
    {
        return $this->belongsTo(\App\Models\TypeSorty::class, 'CodeTypeSortie', 'CodeTypeSortie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributTypeChamps()
    {
        return $this->hasMany(\App\Models\AttributTypeChamp::class, 'CodeTypeChamp', 'CodeTypeChamp');
    }
    function laravelValidationType()
    {
        return $this->typeSorty()->first()->laravelValidationType();
    }
}
