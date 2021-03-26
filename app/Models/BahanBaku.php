<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BahanBaku
 * 
 * @property int $KODE_BAHAN_BAKU
 * @property int $ID_JENIS_BAHAN_BAKU
 * @property string $NAMA_BAHAN_BAKU
 * @property float $STOK_BAHAN_BAKU
 * 
 * @property JenisBahanBaku $jenis_bahan_baku
 * @property Collection|PenerimaanBahanBaku[] $penerimaan_bahan_bakus
 *
 * @package App\Models
 */
class BahanBaku extends Model
{
	protected $table = 'bahan_baku';
	protected $primaryKey = 'KODE_BAHAN_BAKU';

	protected $casts = [
		'ID_JENIS_BAHAN_BAKU' => 'int',
		'STOK_BAHAN_BAKU' => 'float'
	];

	protected $fillable = [
		'ID_JENIS_BAHAN_BAKU',
		'NAMA_BAHAN_BAKU',
		'STOK_BAHAN_BAKU'
	];

	public function jenis_bahan_baku()
	{
		return $this->belongsTo(JenisBahanBaku::class, 'ID_JENIS_BAHAN_BAKU');
	}

	public function penerimaan_bahan_bakus()
	{
		return $this->hasMany(PenerimaanBahanBaku::class, 'KODE_BAHAN_BAKU');
	}
}
