<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamClient extends Pivot
{
    protected $table = 'team_client';
    protected $fillable = ['user_id', 'client_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
