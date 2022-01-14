<?php

namespace Domain\TodoCQRS\Models\Todo;

use Domain\Todos\Models\Traits\Attributes\TodoAttribute;
use Domain\Todos\Models\Traits\Methods\TodoMethod;
use Domain\Todos\Models\Traits\Relationships\TodoRelationship;
use Domain\Todos\Models\Traits\Scopes\TodoScope;
use Domain\Todos\States\PendingTodoStatusState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory,
        TodoAttribute,
        TodoMethod,
        TodoRelationship,
        TodoScope;

    protected $table = 'todos';

    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    protected $attributes = [
        'status' => PendingTodoStatusState::class,
    ];
}
