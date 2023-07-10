<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends BaseModel
{
    use HasFactory, SoftDeletes;

    const ATTR_TABLE                = 'movies';

    const ATTR_CHAR_TITLE           = 'title';
    const ATTR_TEXT_DESCRIPTION     = 'description';
    const ATTR_FLOAT_RATING         = 'rating';
    const ATTR_CHAR_IMAGE           = 'image';

    const ATTR_MODULE_VIEW          = 'movie-view';
    const ATTR_MODULE_CREATE        = 'movie-create';
    const ATTR_MODULE_UPDATE        = 'movie-update';
    const ATTR_MODULE_DELETE        = 'movie-delete';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::ATTR_TABLE;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = self::ATTR_INT_ID;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::ATTR_CHAR_TITLE,
        self::ATTR_TEXT_DESCRIPTION,
        self::ATTR_FLOAT_RATING,
        self::ATTR_CHAR_IMAGE,
    ];
}
