<?php namespace Statuses;

use Larabook\Entities\Status\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

     /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        $users = TestDummy::times(2)->create('Larabook\Entities\User\User');

        $statuses = [];

        $statuses[0] =TestDummy::times(2)->create('Larabook\Entities\Status\Status', [
                'user_id' => $users[0]->id,
                'body' => 'His status'
        ]);

        $statuses[1] = TestDummy::times(2)->create('Larabook\Entities\Status\Status', [
            'user_id' => $users[1]->id,
            'body' => 'Her status'
        ]);

        $statusesForUser0 = $this->repo->getAll($users[0]);
        $statusesForUser1 = $this->repo->getAll($users[1]);

        $this->assertCount(2, $statusesForUser0);
        $this->assertCount(2, $statusesForUser1);

        $this->assertEquals('His status', $statusesForUser0[0]->body);
        $this->assertEquals('Her status', $statusesForUser1[1]->body);
    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        $status = TestDummy::create('Larabook\Entities\Status\Status', [
            'user_id' => null,
            'body' => 'My status'
        ]);

        $user = TestDummy::create('Larabook\Entities\User\User');

        $savedStatus = $this->repo->save($status, $user->id);

        $this->tester->seeRecord('statuses', [
            'body' => 'My status',
            'user_id' => $user->id
        ]);
    }

}
