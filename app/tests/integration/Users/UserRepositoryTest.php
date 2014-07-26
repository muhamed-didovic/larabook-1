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

    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('Larabook\Entities\User\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }



}
