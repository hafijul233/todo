<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'todos';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'task', 'completed_at'];

    protected $casts = [
        'completed_at' => 'datetime'
    ];


    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
