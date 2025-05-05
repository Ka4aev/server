<?php
namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /**
     * Связь с пользователями (один ко многим)
     */
    public function users()
    {
        return $this->hasMany(User::class, 'faculty_id');
    }

    /**
     * Связь с дисциплинами (один ко многим)
     */
    public function disciplines()
    {
        return $this->hasMany(Discipline::class, 'faculty_id');
    }
}