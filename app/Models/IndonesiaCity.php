<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndonesiaCity
 * 
 * @property string $id
 * @property string $province_id
 * @property string $name
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaProvince $indonesia_province
 * @property Collection|AdminGudang[] $admin_gudangs
 * @property Collection|DepoAirMinum[] $depo_air_minums
 * @property Collection|IndonesiaDistrict[] $indonesia_districts
 * @property Collection|ManajerMarketing[] $manajer_marketings
 * @property Collection|OperatorMesin[] $operator_mesins
 * @property Collection|Owner[] $owners
 * @property Collection|SalesA[] $sales_as
 * @property Collection|SalesB[] $sales_bs
 * @property Collection|Supplier[] $suppliers
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class IndonesiaCity extends Model
{
	protected $table = 'indonesia_cities';
	public $incrementing = false;

	protected $fillable = [
		'province_id',
		'name',
		'meta'
	];

	public function indonesia_province()
	{
		return $this->belongsTo(IndonesiaProvince::class, 'province_id');
	}

	public function admin_gudangs()
	{
		return $this->hasMany(AdminGudang::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'KODE_KOTA');
	}

	public function indonesia_districts()
	{
		return $this->hasMany(IndonesiaDistrict::class, 'city_id');
	}

	public function manajer_marketings()
	{
		return $this->hasMany(ManajerMarketing::class, 'KODE_KOTA');
	}

	public function operator_mesins()
	{
		return $this->hasMany(OperatorMesin::class, 'KODE_KOTA');
	}

	public function owners()
	{
		return $this->hasMany(Owner::class, 'KODE_KOTA');
	}

	public function sales_as()
	{
		return $this->hasMany(SalesA::class, 'KODE_KOTA');
	}

	public function sales_bs()
	{
		return $this->hasMany(SalesB::class, 'KODE_KOTA');
	}

	public function suppliers()
	{
		return $this->hasMany(Supplier::class, 'KODE_KOTA');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'KODE_KOTA');
	}
}
