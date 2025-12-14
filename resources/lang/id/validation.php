<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'required'             => ':attribute wajib diisi.',
    'max'                  => [
        'string' => ':attribute maksimal :max karakter.',
    ],
    'image'                => ':attribute harus berupa gambar.',
    'mimes'                => ':attribute harus berformat: :values.',
    'uploaded'             => 'Gagal mengunggah :attribute.',
    'file'                 => ':attribute harus berupa file.',
    'min'                  => [
        'string' => ':attribute minimal :min karakter.',
    ],
    'numeric'              => ':attribute harus berupa angka.',
    'integer'              => ':attribute harus berupa bilangan bulat.',
    'email'                => ':attribute harus berupa alamat email yang valid.',
    // Tambahkan yang lain sesuai kebutuhan

    /*
    |--------------------------------------------------------------------------
    | Custom Attributes
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'nama_prestasi' => 'Nama prestasi',
        'gambar'       => 'Gambar',
        'judul'        => 'Judul',
        'kuota'        => 'Kuota',
        // Tambahkan nama field lain di proyekmu
    ],
];