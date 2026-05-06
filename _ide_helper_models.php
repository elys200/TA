<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $deskripsi_barang
 * @property int $jumlah_barang
 * @property string $kondisi_barang
 * @property string|null $foto_barang
 * @property int|null $ormawa_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status_barang
 * @property-read \App\Models\Ormawa|null $ormawa
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereDeskripsiBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereFotoBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereJumlahBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereKodeBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereKondisiBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereNamaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereOrmawaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereStatusBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereUpdatedAt($value)
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_ormawa
 * @property string $singkatan
 * @property string $jenis_ormawa
 * @property string $status_ormawa
 * @property string $tahun_berdiri
 * @property string|null $foto_organisasi
 * @property string|null $logo
 * @property string|null $ketua
 * @property string|null $email
 * @property string|null $kontak
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $pic_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Barang> $barang
 * @property-read int|null $barang_count
 * @property-read \App\Models\Users|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereFotoOrganisasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereJenisOrmawa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereKetua($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereNamaOrmawa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa wherePicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereSingkatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereStatusOrmawa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereTahunBerdiri($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ormawa whereUpdatedAt($value)
 */
	class Ormawa extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_penanggung_jawab
 * @property string $nim
 * @property string $code_peminjaman
 * @property string $tanggal_mulai_peminjaman
 * @property string $tanggal_selesai_peminjaman
 * @property string $alasan_peminjaman
 * @property int $status_peminjaman
 * @property int|null $ormawa_id
 * @property int|null $user_id
 * @property int|null $barang_id
 * @property int|null $approved_by
 * @property string|null $approve_at
 * @property int|null $rejected_by
 * @property string|null $rejected_at
 * @property string|null $reason_rejected
 * @property int|null $given_by
 * @property string|null $waktu_pemberian
 * @property string|null $foto_pemberian
 * @property int|null $returned_by
 * @property string|null $waktu_pengembalian
 * @property string|null $foto_pengembalian
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $jumlah_barang
 * @property-read \App\Models\Users|null $approver
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\Users|null $given
 * @property-read \App\Models\Ormawa|null $ormawa
 * @property-read \App\Models\Users|null $rejector
 * @property-read \App\Models\Users|null $returned
 * @property-read \App\Models\Users|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereAlasanPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereApproveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereCodePeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereFotoPemberian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereFotoPengembalian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereGivenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereJumlahBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereNamaPenanggungJawab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereOrmawaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereReasonRejected($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereRejectedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereRejectedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereReturnedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereStatusPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereTanggalMulaiPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereTanggalSelesaiPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereWaktuPemberian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanBarang whereWaktuPengembalian($value)
 */
	class PeminjamanBarang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code_peminjaman
 * @property string $nama_penanggung_jawab
 * @property string $nim
 * @property string $tanggal_peminjaman
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property string $alasan_peminjaman
 * @property string $status_peminjaman
 * @property int|null $ruangan_id
 * @property int|null $user_id
 * @property int|null $ormawa_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $approved_by
 * @property string|null $approved_at
 * @property string|null $rejected_reason
 * @property int|null $given_by
 * @property string|null $time_given
 * @property string|null $foto_pemberian
 * @property int|null $returned_by
 * @property string|null $time_returned
 * @property string|null $foto_pengembalian
 * @property int|null $rejected_by
 * @property string|null $rejected_at
 * @property-read \App\Models\Users|null $approver
 * @property-read \App\Models\Users|null $given
 * @property-read \App\Models\Ormawa|null $ormawa
 * @property-read \App\Models\Users|null $rejector
 * @property-read \App\Models\Users|null $returned
 * @property-read \App\Models\Ruangan|null $ruangan
 * @property-read \App\Models\Users|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereAlasanPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereCodePeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereFotoPemberian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereFotoPengembalian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereGivenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereJamMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereJamSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereNamaPenanggungJawab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereOrmawaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereRejectedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereRejectedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereRejectedReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereReturnedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereRuanganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereStatusPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereTanggalPeminjaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereTimeGiven($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereTimeReturned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanRuangan whereUserId($value)
 */
	class PeminjamanRuangan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_ruangan
 * @property string $kode_ruangan
 * @property string $lokasi
 * @property string|null $deskripsi
 * @property int $kapasitas
 * @property string|null $foto
 * @property string $jam_operasional
 * @property int|null $pic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PeminjamanRuangan> $peminjamanRuangan
 * @property-read int|null $peminjaman_ruangan_count
 * @property-read \App\Models\Users|null $pic
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereJamOperasional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereKapasitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereKodeRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereLokasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereNamaRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan wherePicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ruangan whereUpdatedAt($value)
 */
	class Ruangan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nim
 * @property string $nama_lengkap
 * @property string $no_tlp
 * @property string $jurusan
 * @property string $program_studi
 * @property string $password
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $ormawa_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Ormawa|null $ormawa
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNoTlp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOrmawaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProgramStudi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nim
 * @property string $nama_lengkap
 * @property string $no_tlp
 * @property string $jurusan
 * @property string $program_studi
 * @property string $password
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $ormawa_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Ormawa|null $ormawa
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereNoTlp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereOrmawaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereProgramStudi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Users withoutRole($roles, $guard = null)
 */
	class Users extends \Eloquent {}
}

