<?php

namespace App\Rules;

use App\GrupPenduduk;
use Illuminate\Contracts\Validation\Rule;

class GrupRule implements Rule
{
    protected $grup_id = null;
    protected $penduduk_id = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($grup_id, $penduduk_id)
    {
        $this->grup_id = $grup_id;
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
        $grup = GrupPenduduk::where('grup_id', $this->grup_id)->where('penduduk_id', $this->penduduk_id)->first();
        if ($grup) {
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
