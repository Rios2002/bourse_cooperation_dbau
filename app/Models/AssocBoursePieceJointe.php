<?php

namespace App\Models;

use App\Models\Bourse;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocBoursePieceJointe
 *
 * @property $id
 * @property $bourse_id
 * @property $piece_jointe_id
 * @property $CodeDiplome
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopBourse $coopBourse
 * @property CoopDiplomeDeBase $coopDiplomeDeBase
 * @property CoopPieceJointe $coopPieceJointe
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocBoursePieceJointe extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['bourse_id', 'piece_jointe_id', 'CodeDiplome'];


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
    public function diplomeDeBase()
    {
        return $this->belongsTo(DiplomeDeBase::class, 'CodeDiplome', 'CodeDiplome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pieceJointe()
    {
        return $this->belongsTo(PieceJointe::class, 'piece_jointe_id', 'id');
    }
}
