<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinorOperatingSystem extends Model
{
    use HasFactory;

    public function majorOperatingSystem()
    {
        return $this->belongsTo(MajorOperatingSystem::class);
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'release_date' => 'date:Y-m-d',
        ];
    }
}
