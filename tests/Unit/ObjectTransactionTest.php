<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use PHPUnit\Framework\TestCase;

class ObjectTransactionTest extends TestCase
{
//write unit test for object transaction Create operations in laravel
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        //Given we have task in the database
        $task = ObjectTransaction::factory()->create();

        //When user visit the tasks page
        $response = $this->get(route('admin.businessRegistration.setting.objectTransaction.create'));

        //He should be able to read the task
        $response->assertSee($task->title);
    }

}
