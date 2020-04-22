<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Projet
 *
 * @property int $id
 * @property string $projet_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projet whereProjet_name($value)
 * @mixin \Eloquent
 */
class Projet extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['projet_name'];

    /**
     * Obtiens les images reliées au projet
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
