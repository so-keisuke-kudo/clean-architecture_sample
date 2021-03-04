<?php

namespace Tests\Feature\ValueObject;

use Domain\Exceptions\InvariantException;
use Domain\ValueObjects\UserEmail;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserEmailTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     * @throws InvariantException
     */
    public function 正しいメールアドレスが渡された場合オブジェクト生成がされる(): void
    {
        $expected = $this->faker->email;
        $email = new UserEmail($expected);
        self::assertSame($expected, $email->get());
    }

    /**
     * @test
     */
    public function メールアドレスとして妥当でない値が渡された場合例外が発生する(): void
    {
        $this->expectException(InvariantException::class);
        new UserEmail('example.com');
    }
}
