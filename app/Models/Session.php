<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tag_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Tag $tag
 */
class Session extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tag_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
