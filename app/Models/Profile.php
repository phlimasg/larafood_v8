<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
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

    public function permissions()
    {
        return $this->BelongsToMany(Permission::class);
    }
}
