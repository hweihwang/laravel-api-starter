<?php

use Domain\Todos\Actions\CreateTodoAction;
use Domain\Todos\DataTransferObjects\CreateTodoData;

it('creates a todo', function () {
    $dTO = new CreateTodoData();

    $dTO->setTitle('title')->setContent('hello world');

    try {
        $todo = (new CreateTodoAction())($dTO);

        $this->assertTrue(isset($todo->id));
    } catch (\Exception $e) {
        $this->assertInstanceOf(DomainException::class, $e);

        $this->assertEquals('Cannot create todo', $e->getMessage());
    }
});


