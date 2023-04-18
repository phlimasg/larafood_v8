<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name','description'
    ];

    public function search($search = null)
    {
        return $this->where('name','like',"%{$search}%")
                    ->orWhere('description','like',"%{$search}%")
                    ->paginate(5);
    }

    public function profiles()
    {
        return $this->BelongsToMany(Profile::class);
    }
}
