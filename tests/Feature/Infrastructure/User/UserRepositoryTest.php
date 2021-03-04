<?php

namespace Tests\Feature\Infrastructure\User;

use App\Infrastructure\User\UserRepository;
use Domain\Entities\UserEntity;
use Domain\Exceptions\InvariantException;
use Domain\Repositories\UserRepositoryInterface;
use Domain\ValueObjects\UserAddress;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserName;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private UserRepositoryInterface $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new UserRepository();
    }

    /**
     * @test
     * @throws InvariantException
     */
    public function ユーザー登録される(): void
    {
        $entity = new UserEntity(
            new UserName($this->faker->name),
            new UserEmail($this->faker->email),
            new UserAddress($this->faker->streetAddress)
        );
        $userId = $this->repository->create($entity);
        self::assertSame(1, $userId);
        $this->assertDatabaseHas(
            'users',
            [
                'name' => $entity->userName->get(),
                'email' => $entity->userEmail->get(),
                'address' => $entity->address->get(),
            ]
        );
    }
}
