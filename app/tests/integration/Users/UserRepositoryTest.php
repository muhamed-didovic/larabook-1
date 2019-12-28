<?php namespace Users;

use Larabook\Entities\User\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;
    protected $repo;

    protected function _before()
    {
        $this->repo = new UserRepository;
    }

     /** @test */
    public function it_saves_a_new_user()
    {
        $user = TestDummy::create('Larabook\Entities\User\User', [
            'username' => 'johndoe',
            'email' => 'john@gmail.com'
        ]);

        $this->repo->save($user);

        $userRecord = $this->tester->grabRecord('users', [
            'username' => 'johndoe',
            'email' => 'john@gmail.com'
        ]);

        $this->assertEquals('johndoe', $userRecord->username);

        // $this->tester->seeRecord('users', [
        //     'username' => 'johnddoe',
        //     'email' => 'john@gmail.com'
        // ]);
    }

    /** @test */
    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('Larabook\Entities\User\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_username()
    {
        $statuses = TestDummy::times(3)->create('Larabook\Entities\Status\Status');
        $username = $statuses[0]->user->username;

        $user = $this->repo->findByUsernameWithStatuses($username);

        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }

    /** @test */
    public function it_follows_another_user()
    {
        $users = TestDummy::times(2)->create('Larabook\Entities\User\User');

        $this->repo->follow($users[1]->id, $users[0]);

        $this->assertTrue($users[0]->follows->contains($users[1]->id));
    }

     /** @test */
    public function it_unfollows_another_user()
    {
        $users = TestDummy::times(2)->create('Larabook\Entities\User\User');

        $this->repo->unfollow($users[1]->id, $users[0]);

        $this->assertFalse($users[0]->follows->contains($users[1]->id));
    }
}
