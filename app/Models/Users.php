<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Users
 * 
 * @property int $id
 * @property string $username
 * @property string $fullname
 * @property string $password
 * @property string $email
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $status
 * @property string $role
 * @property string|null $jabatan
 * @property string|null $nip
 * @property string|null $nomor_ponsel
 *
 * @package App\Models
 */
class Users extends Model
{
	protected $table = 'users';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'fullname',
		'password',
		'remember_token',
		'status',
		'role',
		'jabatan',
		'nip',
		'email',
		'nomor_ponsel'
	];
}
