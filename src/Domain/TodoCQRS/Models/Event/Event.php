<?php

namespace Domain\TodoCQRS\Models\Event;

use Domain\TodoCQRS\Models\Event\Traits\Attributes\EventAttribute;
use Domain\TodoCQRS\Models\Event\Traits\Methods\EventMethod;
use Domain\TodoCQRS\Models\Event\Traits\Relationships\EventRelationship;
use Domain\TodoCQRS\Models\Event\Traits\Scopes\EventScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory,
        EventAttribute,
        EventMethod,
        EventRelationship,
        EventScope;

    protected $table = 'events';

    protected $fillable = [
        'command',
        'event',
        'status'
    ];
}
