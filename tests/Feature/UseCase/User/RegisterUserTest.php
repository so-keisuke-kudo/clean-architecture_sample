<?php

namespace Tests\Feature\UseCase\User;

use App\UseCase\User\RegisterUser;
use Domain\Entities\UserEntity;
use Domain\Exceptions\InvariantException;
use Domain\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     * @throws InvariantException
     */
    public function ユーザー登録される(): void
    {
        $repository = new class implements UserRepositoryInterface {
            public function create(UserEntity $entity): int
            {
                return 1;
            }
        };
        $useCase = new RegisterUser($repository);
        self::assertSame(
            1,
            $useCase->execute($this->faker->name, $this->faker->email, $this->faker->streetAddress)
        );
    }
}
