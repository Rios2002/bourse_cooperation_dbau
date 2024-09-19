<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocBourseFiliere
 *
 * @property $id
 * @property $bourse_id
 * @property $filiere_id
 * @property $CodeCycle
 * @property $quota
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopBourse $coopBourse
 * @property CoopCycle $coopCycle
 * @property CoopFiliere $coopFiliere
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocBourseFiliere extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['bourse_id', 'filiere_id', 'CodeCycle', 'quota'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bourse()
    {
        return $this->belongsTo(Bourse::class, 'bourse_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'CodeCycle', 'CodeCycle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id', 'id');
    }
}
