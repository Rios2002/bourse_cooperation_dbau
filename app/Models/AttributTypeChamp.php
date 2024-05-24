<?php

namespace App\Models;

use App\Models\TypeChamp;
use App\Models\TypeSorty;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AttributTypeChamp
 *
 * @property $id
 * @property $CodeTypeChamp
 * @property $SpatieFunction
 * @property $LaravelValidationKey
 * @property $Description
 * @property $TypeValeur
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopTypeChamp $coopTypeChamp
 * @property CoopTypeSorty $coopTypeSorty
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AttributTypeChamp extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeTypeChamp', 'SpatieFunction', 'LaravelValidationKey', 'Description', 'TypeValeur'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeChamp()
    {
        return $this->belongsTo(TypeChamp::class, 'CodeTypeChamp', 'CodeTypeChamp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeSorty()
    {
        return $this->belongsTo(TypeSorty::class, 'TypeValeur', 'CodeTypeSortie');
    }

    function getDefaultValue()
    {
        $tc = $this->typeChamp()->first();
        $json = json_decode($tc->SpatieAttributes, true);

        if (in_array($this->SpatieFunction, array_keys($json))) {

            return $json[$this->SpatieFunction];
        }
        return null;
    }
}
