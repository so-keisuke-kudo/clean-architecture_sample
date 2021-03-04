<?php

namespace Tests\Feature\ValueObject;

use Domain\Exceptions\InvariantException;
use Domain\ValueObjects\UserName;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserNameTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     * @throws InvariantException
     */
    public function 名前が渡された場合オブジェクト生成がされる(): void
    {
        $expected = $this->faker->name;
        $name = new UserName($expected);
        self::assertSame($expected, $name->get());
    }

    /**
     * @test
     */
    public function 空文字が渡された場合例外が発生する(): void
    {
        $this->expectException(InvariantException::class);
        new UserName('');
    }
}
