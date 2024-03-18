<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorOperatingSystem extends Model
{
    use HasFactory;

    public function minorOperatingSystems()
    {
        return $this->hasMany(MinorOperatingSystem::class);
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
