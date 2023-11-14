<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illumiate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo as RelationsBelongsTo;

class Chirp extends Model
{
    use HasFactory;

    // enables mass assignment for the message attribute
    protected $fillable = [
        'message',
    ];

    public function user(): RelationsBelongsTo
    {
        return $this->belongsTo(User::class);
        // defines a belongs to relationship between the Chirp and User models
    }

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
}
