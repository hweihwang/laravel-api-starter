<?php

namespace Domain\TodoCQRS\Models\Todo\Traits\Attributes;

use Domain\Todos\States\TodoStatusState;

/**
 * Trait TodoAttribute.
 */
trait TodoAttribute
{
    /**
     * @commment Get status object
     * @return TodoStatusState
     */
    public function getStatusAttribute(): TodoStatusState
    {
        return new $this->attributes['status'];
    }

    /**
     * @commment Set model status string from object
     * @param TodoStatusState $statusState
     * @return void
     */

    public function setStatusAttribute(TodoStatusState $statusState): void
    {
        $this->attributes['status'] = get_class($statusState);
    }
}
