<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocBourseDiplomeDisponible
 *
 * @property $id
 * @property $bourse_id
 * @property $CodeDiplome
 * @property $saisirFiliere
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopBourse $coopBourse
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocBourseDiplomeDisponible extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['bourse_id', 'CodeDiplome', 'saisirFiliere'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coopBourse()
    {
        return $this->belongsTo(\App\Models\CoopBourse::class, 'bourse_id', 'id');
    }
    
}
