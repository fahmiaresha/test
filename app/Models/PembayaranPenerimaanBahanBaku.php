<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PembayaranPenerimaanBahanBaku
 * 
 * @property int $KODE_PEMBAYARAN
 * @property int $ID_PENERIMAAN
 * @property int $ID_OWNER
 * @property Carbon $TGL_PEMBAYARAN
 * @property int $STATUS_PEMBAYARAN
 * 
 * @property Owner $owner
 * @property PenerimaanBahanBaku $penerimaan_bahan_baku
 *
 * @package App\Models
 */
class PembayaranPenerimaanBahanBaku extends Model
{
	protected $table = 'pembayaran_penerimaan_bahan_baku';
	protected $primaryKey = 'KODE_PEMBAYARAN';

	protected $casts = [
		'ID_PENERIMAAN' => 'int',
		'ID_OWNER' => 'int',
		'STATUS_PEMBAYARAN' => 'int'
	];

	protected $dates = [
		'TGL_PEMBAYARAN'
	];

	protected $fillable = [
		'ID_PENERIMAAN',
		'ID_OWNER',
		'TGL_PEMBAYARAN',
        'BIAYA_TRANSAKSI',
		'STATUS_PEMBAYARAN'
	];

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function penerimaan_bahan_baku()
	{
		return $this->belongsTo(PenerimaanBahanBaku::class, 'ID_PENERIMAAN');
	}
}
