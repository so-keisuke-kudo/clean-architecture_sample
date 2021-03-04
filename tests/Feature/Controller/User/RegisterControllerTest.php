<?php

namespace Tests\Feature\Controller\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function ユーザー登録される(): void
    {
        $params = [
            'user_name' => $this->faker->name,
            'email' => $this->faker->email,
            'address' => $this->faker->streetAddress,
        ];
        $this->post(route('user-register'), $params)
            ->assertStatus(302)
            ->assertRedirect(route('welcome'));
    }

    /**
     * @test
     */
    public function 名前が空の場合エラー(): void
    {
        $this->post(route('user-register'), [])
            ->assertSessionHasErrors(['user_name' => 'ユーザー名は必ず指定してください。']);
    }

    /**
     * @test
     */
    public function メールアドレスが空の場合エラー(): void
    {
        $this->post(route('user-register'), [])
            ->assertSessionHasErrors(['email' => 'メールアドレスは必ず指定してください。']);
    }
}
