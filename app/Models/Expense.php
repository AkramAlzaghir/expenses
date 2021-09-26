<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Expense extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['amount', 'notes', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function type()
    {
        return $this->belongsTo(Type::class);
    }*/

    public function departments()
    {
        return $this->belongsToMany(Department::class, DepartmentsExpenses::class);
    }
}
