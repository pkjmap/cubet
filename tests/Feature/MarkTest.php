<?php

namespace Tests\Feature;

use App\Models\Mark;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MarkTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    public function data()
    {
        $student = new Student();
        $student->name = 'Test';
        $student->age = 18;
        $student->gender = 'Male';
        $student->reporting_to = 1;
        $student->save();

        $mark = new Mark();
        $mark->id = 10000;
        $mark->student_id = $student->id;
        $mark->maths = 10;
        $mark->science = 10;
        $mark->history = 10;
        $mark->term = 'One';
        $mark->save();
    }
    
    public function test_student_is_displayed_is_makelist(): void
    {
        $this->data();
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/mark');
        $response->assertSeeText('Test', $escaped = true);
        $response->assertOk();
    }
    public function test_mark_record_is_deleted()
    {
        $this->data();
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->delete('/mark/10000');
        $response->assertDontSeeText('Test', $escaped = true);
    }
    public function test_mark_is_validated()
    {
        $mark = new Mark();
        $data['id'] = 10000;
        $data['student_id'] = 1;
        $data['maths'] = '';
        $data['science'] = '';
        $data['history'] = '';
        $data['term'] = 'One';

        $user = User::factory()->create();
        
        $response = $this
            ->actingAs($user)
            ->post('/mark', $data);
        $response->assertSeeText('The history field must be an integer.', $escaped = true);
    }
}
