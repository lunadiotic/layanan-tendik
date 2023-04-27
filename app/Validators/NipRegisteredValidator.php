<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Models\Tendik;

class NipRegisteredValidator
{
    public function register()
    {
        Validator::extend('nip_registered', function ($attribute, $value, $parameters, $validator) {
            return Tendik::where('nip', $value)->exists();
        });

        Validator::replacer('nip_registered', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'NIP :attribute tidak terdaftar. Silakan periksa kembali atau hubungi dinas terkait.');
        });
    }
}
