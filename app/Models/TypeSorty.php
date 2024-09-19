<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeSorty
 *
 * @property $CodeTypeSortie
 * @property $LibelleTypeSortie
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeSorty extends Model
{

    protected $perPage = 20;
    protected $primaryKey = 'CodeTypeSortie';
    public $incrementing = false;
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeTypeSortie', 'LibelleTypeSortie'];

    function laravelValidationType()
    {
        switch ($this->CodeTypeSortie) {
            case 'double':
                return 'numeric';
                break;

            default:
                return $this->CodeTypeSortie;
        }
    }
}
