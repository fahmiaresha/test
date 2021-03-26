<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $ID_USER
 * @property string $KODE_KOTA
 * @property int $KODE_JABATAN
 * @property string $username
 * @property string $password
 * @property string $NAMA_USER
 * @property string $ALAMAT_USER
 * @property int $JENIS_KELAMIN_USER
 * @property string|null $NO_TELP_USER
 * @property string $EMAIL_USER
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Jabatan $jabatan
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'user';
	protected $primaryKey = 'ID_USER';

	protected $casts = [
		'KODE_JABATAN' => 'int'
	];

	protected $fillable = [
		'KODE_JABATAN',
		'username',
		'password',
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'KODE_JABATAN');
	}

	public static function operator_mesin($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','op.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('operator_mesin as op','l.ID_PEGAWAI','op.ID_OPERATOR_MESIN')
		->join('indonesia_cities as c','c.id','op.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}

	public static function admin_gudang($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','ag.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('admin_gudang as ag','l.ID_PEGAWAI','ag.ID_ADMIN_GUDANG')
		->join('indonesia_cities as c','c.id','ag.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}

	public static function manajer_marketing($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','mm.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('manajer_marketing as mm','l.ID_PEGAWAI','mm.ID_MANAJER_MARKETING')
		->join('indonesia_cities as c','c.id','mm.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}

	public static function owner($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','o.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('owner as o','l.ID_PEGAWAI','o.ID_OWNER')
		->join('indonesia_cities as c','c.id','o.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}

	public static function sales_a($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','sa.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('sales_a as sa','l.ID_PEGAWAI','sa.ID_SALES_A')
		->join('indonesia_cities as c','c.id','sa.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}

	public static function sales_b($id)
	{
		return self::select('c.name AS NAMA_KOTA','p.name AS NAMA_PROVINSI','sb.*','user.*')->join('log as l','l.ID_USER_LOG','user.ID_USER')
		->join('sales_b as sb','l.ID_PEGAWAI','sb.ID_SALES_B')
		->join('indonesia_cities as c','c.id','sb.KODE_KOTA')
		->join('indonesia_provinces as p','p.id','c.province_id')
		->where('user.ID_USER',$id)->first();
	}
}
