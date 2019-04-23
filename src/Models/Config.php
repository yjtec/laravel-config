<?php

namespace Yjtec\Config\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table="config";
    protected $fillable = ['key','value'];
    protected $primaryKey = 'key';
    public $incrementing = false;
    public $timestamps = false;
}
