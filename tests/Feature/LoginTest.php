<?php

namespace Tests\Feature;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private const NIM = '3312301023';
    private const PASSWORD = '12345678';

    private function buatUser(array $attributes = []): Users
    {
        return Users::create(array_merge([
            'nim' => self::NIM,
            'nama_lengkap' => 'User Test',
            'password' => Hash::make(self::PASSWORD),
            'status' => Users::STATUS_ACTIVE,
            'no_tlp' => '081234567890',
        ], $attributes));
    }

    public function test_login_berhasil_dengan_nim_dan_password_benar(): void
    {
        $user = $this->buatUser();

        $response = $this->post('/login', [
            'nim' => self::NIM,
            'password' => self::PASSWORD,
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('success', 'Login berhasil!');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_gagal_jika_password_salah(): void
    {
        $this->buatUser();

        $response = $this->from('/login')->post('/login', [
            'nim' => self::NIM,
            'password' => 'passwordsalah',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Password Salah');
        $this->assertGuest();
    }

    public function test_login_gagal_jika_nim_tidak_terdaftar(): void
    {
        $response = $this->from('/login')->post('/login', [
            'nim' => self::NIM,
            'password' => self::PASSWORD,
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'NIM tidak terdaftar');
        $this->assertGuest();
    }

    public function test_login_gagal_jika_akun_belum_aktif(): void
    {
        $this->buatUser(['status' => Users::STATUS_INACTIVE]);

        $response = $this->from('/login')->post('/login', [
            'nim' => self::NIM,
            'password' => self::PASSWORD,
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Akun belum aktif, Harap Kontak Admin');
        $this->assertGuest();
    }

    public function test_login_gagal_jika_field_kosong(): void
    {
        $response = $this->from('/login')->post('/login', []);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['nim', 'password']);
        $this->assertGuest();
    }
}
