<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocChampDemande
 *
 * @property $id
 * @property $champ_formulaire_id
 * @property $demande_id
 * @property $Saisi
 * @property $created_at
 * @property $updated_at
 *
 * @property ChampFormulaire $champFormulaire
 * @property Demande $demande
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocChampDemande extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['champ_formulaire_id', 'demande_id', 'Saisi'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function champFormulaire()
    {
        return $this->belongsTo(\App\Models\ChampFormulaire::class, 'champ_formulaire_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function demande()
    {
        return $this->belongsTo(\App\Models\Demande::class, 'demande_id', 'id');
    }
    
}
