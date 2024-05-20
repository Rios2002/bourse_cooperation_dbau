<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocDemandePieceJointe
 *
 * @property $id
 * @property $demande_id
 * @property $piece_jointe_id
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopDemande $coopDemande
 * @property CoopPieceJointe $coopPieceJointe
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocDemandePieceJointe extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['demande_id', 'piece_jointe_id', 'url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coopDemande()
    {
        return $this->belongsTo(\App\Models\CoopDemande::class, 'demande_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coopPieceJointe()
    {
        return $this->belongsTo(\App\Models\CoopPieceJointe::class, 'piece_jointe_id', 'id');
    }
    
}
