<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocBoursFormulaire
 *
 * @property $id
 * @property $formulaire_id
 * @property $bourse_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Bourse $bourse
 * @property Formulaire $formulaire
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocBoursFormulaire extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['formulaire_id', 'bourse_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bourse()
    {
        return $this->belongsTo(\App\Models\Bourse::class, 'bourse_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formulaire()
    {
        return $this->belongsTo(\App\Models\Formulaire::class, 'formulaire_id', 'id');
    }
    
}
