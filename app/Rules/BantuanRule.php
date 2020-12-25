<?php

namespace App\Rules;

use App\BantuanPenduduk;
use Illuminate\Contracts\Validation\Rule;

class BantuanRule implements Rule
{
    protected $bantuan_id = null;
    protected $penduduk_id = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($bantuan_id, $penduduk_id)
    {
        $this->bantuan_id = $bantuan_id;
        $this->penduduk_id = $penduduk_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $bantuan = BantuanPenduduk::where('bantuan_id', $this->bantuan_id)->where('penduduk_id', $this->penduduk_id)->first();
        if ($bantuan) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Peserta ini sudah terdaftar pada program ini.';
    }
}
