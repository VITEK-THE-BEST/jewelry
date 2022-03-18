<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $timestamps = false;

    protected $casts = [
        'material_id' => 'int',
        'gem_id' => 'int',
        'type_id' => 'int'
    ];

    protected $fillable = [
        'material_id',
        'gem_id',
        'type_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function gem()
    {
        return $this->belongsTo(Gem::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
