<?php


namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property string $name
 * @property string $email
 * @property string $google_id
 */

class User extends Authenticatable
{
    use Notifiable;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'user_profile'
    ];
    protected $primaryKey = 'user_id';

    protected function userProfile(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? base64_encode($value) : null,
        );
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }


    // Inside class User extends Authenticatable
    public function transactions()
    {
        // This tells Laravel: "Look for transactions where the user_id matches my user_id"
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }
}
