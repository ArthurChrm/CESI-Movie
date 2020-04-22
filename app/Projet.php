<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Projet
 *
 * @property int $id
 * @property string $nom_projet
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet wherenom_projet($value)
 * @mixin \Eloquent
 */
class Projet extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom_projet'];

    /**
     * Obtiens les images reliées au projet
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
