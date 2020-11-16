<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTablePenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduk', function (Blueprint $table) {
            $table->tinyInteger('nomor_urut_dalam_kk')->after('kk');
            $table->string('kk',32)->change();
            $table->string('nik',32)->change();
            $table->string('tempat_lahir', 32)->nullable()->change();
            $table->unsignedBigInteger('agama_id')->nullable()->change();
            $table->unsignedBigInteger('status_perkawinan_id')->nullable()->change();
            $table->unsignedBigInteger('status_hubungan_dalam_keluarga_id')->nullable()->change();
            $table->string('etnis_atau_suku',64)->nullable()->after('nama');
            $table->string('foto')->nullable()->after('nama');
            $table->tinyInteger('ktp_elektronik')->comment('1: BELUM, 2: KTP-EL')->nullable()->after('nama');
            $table->unsignedBigInteger('status_rekam_id')->nullable()->after('ktp_elektronik');
            $table->foreign('status_rekam_id')->references('id')->on('status_rekam')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('status_penduduk_id')->nullable()->after('agama_id');
            $table->foreign('status_penduduk_id')->references('id')->on('status_penduduk')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_akta_kelahiran',32)->nullable()->after('tempat_lahir');
            $table->time('waktu_kelahiran')->nullable()->after('tanggal_lahir');
            $table->unsignedBigInteger('tempat_dilahirkan_id')->nullable()->after('tanggal_lahir');
            $table->foreign('tempat_dilahirkan_id')->references('id')->on('tempat_dilahirkan')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_kelahiran_id')->nullable()->after('tempat_dilahirkan_id');
            $table->foreign('jenis_kelahiran_id')->references('id')->on('jenis_kelahiran')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('anak_ke')->nullable()->after('jenis_kelahiran_id');
            $table->unsignedBigInteger('penolong_kelahiran_id')->nullable()->after('anak_ke');
            $table->foreign('penolong_kelahiran_id')->references('id')->on('penolong_kelahiran')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('berat_lahir')->nullable()->after('penolong_kelahiran_id');
            $table->integer('panjang_lahir')->nullable()->after('berat_lahir');
            $table->date('tgl_berakhir_paspor')->nullable()->after('nomor_paspor');
            $table->string('nomor_telepon',16)->nullable()->after('detail_dusun_id');
            $table->string('alamat_email',64)->nullable()->after('nomor_telepon');
            $table->renameColumn('alamat','alamat_sekarang');
            $table->string('alamat_sebelumnya')->nullable()->after('alamat_email');
            $table->string('nomor_akta_perkawinan',32)->nullable()->after('status_perkawinan_id');
            $table->date('tanggal_perkawinan')->nullable()->after('nomor_akta_perkawinan');
            $table->string('nomor_akta_perceraian',32)->nullable()->after('tanggal_perkawinan');
            $table->date('tanggal_perceraian')->nullable()->after('nomor_akta_perceraian');
            $table->unsignedBigInteger('jenis_cacat_id')->nullable()->after('darah_id');
            $table->foreign('jenis_cacat_id')->references('id')->on('jenis_cacat')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('sakit_menahun_id')->nullable()->after('jenis_cacat_id');
            $table->foreign('sakit_menahun_id')->references('id')->on('sakit_menahun')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('akseptor_kb_id')->nullable()->after('sakit_menahun_id');
            $table->foreign('akseptor_kb_id')->references('id')->on('akseptor_kb')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('asuransi_id')->nullable()->after('akseptor_kb_id');
            $table->foreign('asuransi_id')->references('id')->on('asuransi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk', function (Blueprint $table) {
            $table->dropForeign('penduduk_asuransi_id_foreign');
            $table->dropForeign('penduduk_akseptor_kb_id_foreign');
            $table->dropForeign('penduduk_sakit_menahun_id_foreign');
            $table->dropForeign('penduduk_jenis_cacat_id_foreign');
            $table->dropForeign('penduduk_penolong_kelahiran_id_foreign');
            $table->dropForeign('penduduk_jenis_kelahiran_id_foreign');
            $table->dropForeign('penduduk_tempat_dilahirkan_id_foreign');
            $table->dropForeign('penduduk_status_penduduk_id_foreign');
            $table->dropForeign('penduduk_status_rekam_id_foreign');
            $table->dropColumn([
                'etnis_atau_suku',
                'nomor_urut_dalam_kk',
                'foto',
                'asuransi_id',
                'akseptor_kb_id',
                'sakit_menahun_id',
                'jenis_cacat_id',
                'tanggal_perceraian',
                'nomor_akta_perceraian',
                'tanggal_perkawinan',
                'nomor_akta_perkawinan',
                'alamat_sebelumnya',
                'alamat_email',
                'nomor_telepon',
                'tgl_berakhir_paspor',
                'panjang_lahir',
                'berat_lahir',
                'penolong_kelahiran_id',
                'anak_ke',
                'jenis_kelahiran_id',
                'tempat_dilahirkan_id',
                'waktu_kelahiran',
                'nomor_akta_kelahiran',
                'status_penduduk_id',
                'status_rekam_id',
                'ktp_elektronik'
            ]);
            $table->renameColumn('alamat_sekarang','alamat');
        });
    }
}
