<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OperatorMesin
 * 
 * @property int $ID_OPERATOR_MESIN
 * @property string $KODE_KOTA
 * @property string $NAMA_OPERATOR_MESIN
 * @property string $ALAMAT_OPERATOR_MESIN
 * @property int $JENIS_KELAMIN_OPERATOR_MESIN
 * @property string|null $NO_TELP_OPERATOR_MESIN
 * @property string|null $EMAIL_OPERATOR_MESIN
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|PengambilanBahanBaku[] $pengambilan_bahan_bakus
 *
 * @package App\Models
 */
class OperatorMesin extends Model
{
	protected $table = 'operator_mesin';
	protected $primaryKey = 'ID_OPERATOR_MESIN';

	protected $casts = [
		'JENIS_KELAMIN_OPERATOR_MESIN' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_OPERATOR_MESIN',
		'ALAMAT_OPERATOR_MESIN',
		'JENIS_KELAMIN_OPERATOR_MESIN',
		'NO_TELP_OPERATOR_MESIN',
		'EMAIL_OPERATOR_MESIN'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function pengambilan_bahan_bakus()
	{
		return $this->hasMany(PengambilanBahanBaku::class, 'ID_OPERATOR_MESIN');
	}

	public function getid_user()
	{
		return Log::where([
			'ID_PEGAWAI' => $this->ID_OPERATOR_MESIN,
			'ID_JABATAN_LOG' => 6,
		])->value('ID_USER_LOG');
	}
}
