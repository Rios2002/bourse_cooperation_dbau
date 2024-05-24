<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocAttributChamp
 *
 * @property $id
 * @property $champ_formulaire_id
 * @property $attribut_type_champ_id
 * @property $Valeur
 * @property $created_at
 * @property $updated_at
 *
 * @property AttributTypeChamp $attributTypeChamp
 * @property ChampFormulaire $champFormulaire
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocAttributChamp extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['champ_formulaire_id', 'attribut_type_champ_id', 'Valeur'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributTypeChamp()
    {
        return $this->belongsTo(\App\Models\AttributTypeChamp::class, 'attribut_type_champ_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function champFormulaire()
    {
        return $this->belongsTo(\App\Models\ChampFormulaire::class, 'champ_formulaire_id', 'id');
    }
    
}
