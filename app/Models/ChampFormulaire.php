<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ChampFormulaire
 *
 * @property $id
 * @property $formulaire_id
 * @property $CodeTypeChamp
 * @property $LibelleChamp
 * @property $DescriptionChamp
 * @property $classCSS
 * @property $isRequired
 * @property $created_at
 * @property $updated_at
 *
 * @property TypeChamp $typeChamp
 * @property Formulaire $formulaire
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ChampFormulaire extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['formulaire_id', 'CodeTypeChamp', 'LibelleChamp', 'DescriptionChamp', 'classCSS', 'isRequired'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeChamp()
    {
        return $this->belongsTo(\App\Models\TypeChamp::class, 'CodeTypeChamp', 'CodeTypeChamp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formulaire()
    {
        return $this->belongsTo(\App\Models\Formulaire::class, 'formulaire_id', 'id');
    }
    function buildHTML()
    {
        $tc = $this->typeChamp()->first();
        $attributs = $this->getAttributsValues()->get();
        $fieldset = html()->fieldset();

        $nomFN1 = $tc->SpatieFunction;
        $classCSS = $tc->ClassCSS . ' ' . $this->classCSS . ' ';
        $resp =  html()->$nomFN1()->class($classCSS)->name($this->getName());
        foreach (json_decode($tc->SpatieAttributes, true) as $key => $value) {
            $resp = $resp->attribute($key, $value);
        }

        foreach ($attributs as $attribut) {
            // dump($attribut, $attribut->SpatieFunction, $attribut->Valeur);
            $resp = $resp->attribute($attribut->SpatieFunction, $attribut->Valeur);
        }

        if ($this->isRequired) {
            $resp = $resp->required();
        }
        return $resp;
    }

    function buildLabel()
    {
        return html()->label($this->LibelleChamp)->for($this->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function getAttributsChamp()
    {
        return $this->hasManyThrough(AttributTypeChamp::class, AssocAttributChamp::class, 'champ_formulaire_id', 'id', 'id', 'attribut_type_champ_id');
    }

    function getAttributsValues()
    {
        return  AssocAttributChamp::where('champ_formulaire_id', $this->id)
            ->join('attribut_type_champs', 'attribut_type_champs.id', '=', 'assoc_attribut_champs.attribut_type_champ_id');
    }

    function rules()
    {
        $tc = $this->typeChamp()->first();
        $attributs = $this->getAttributsValues()->get();

        $rules = [];
        if ($this->isRequired) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }

        $rules[] = $tc->laravelValidationType();

        foreach ($attributs as $attribut) {
            $val = ($this->getAttributsValues()->where("attribut_type_champ_id", $attribut->id))->first();
            if ($val && !is_null($attribut->LaravelValidationKey)) {
                $rules[] = $attribut->LaravelValidationKey . ':' . $val->Valeur;
            }
        }

        return $rules;
    }
    function getName()
    {
        return "form_" . ($this->formulaire()->first()->id) . "_champ_" . $this->id;
    }
    function getRemplissageChamp($demande_id)
    {
        $assoc = AssocChampDemande::where("champ_formulaire_id", $this->id)
            ->where('demande_id', $demande_id);
        if ($assoc->exists()) {
            return $assoc->first()->Saisi;
        }
        return '';
    }
}
