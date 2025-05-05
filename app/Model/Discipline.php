<?php
namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $table = 'disciplines';

    protected $fillable = [
        'name',
        'all_time',
        'faculty_id'
    ];

    public $timestamps = false;

    /**
     * Связь с факультетом (многие к одному)
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    /**
     * Связь с пользователями (многие ко многим через промежуточную таблицу)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_disciplines', 'discipline_id', 'user_id')
            ->withPivot('current_time');
    }
}