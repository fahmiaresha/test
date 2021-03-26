<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPengambilan
 * 
 * @property int $ID_PENERIMAAN
 * @property int $KODE_PENGAMBILAN
 * @property float|null $JUMLAH_KG
 * @property float|null $JUMLAH_SAK_KARUNG
 * 
 * @property PenerimaanBahanBaku $penerimaan_bahan_baku
 * @property PengambilanBahanBaku $pengambilan_bahan_baku
 *
 * @package App\Models
 */
class DetailPengambilan extends Model
{
	protected $table = 'detail_pengambilan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PENERIMAAN' => 'int',
		'KODE_PENGAMBILAN' => 'int',
		'JUMLAH_KG' => 'float',
		'JUMLAH_SAK_KARUNG' => 'float'
	];

	protected $fillable = [
		'JUMLAH_KG',
		'JUMLAH_SAK_KARUNG'
	];

	public function penerimaan_bahan_baku()
	{
		return $this->belongsTo(PenerimaanBahanBaku::class, 'ID_PENERIMAAN');
	}

	public function pengambilan_bahan_baku()
	{
		return $this->belongsTo(PengambilanBahanBaku::class, 'KODE_PENGAMBILAN_BAHAN_BAKU');
	}
}
