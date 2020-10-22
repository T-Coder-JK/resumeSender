<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * @test
     * @group jobApplication
     * @return void
     */
    public function JobApplicationCreateTest(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->get('application/'.$user->id.'/create');
        $response->assertOk();

    }
}
