<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    public $timestamps = false;
    protected $table = 'images';
    
    protected $fillable = [
        'ext', 'name', 'folder'
    ];
    protected $attributes = [
        'ext'  => '', 
        'name'  => '', 
        'folder'  => ''        
        ];
    
    
}
