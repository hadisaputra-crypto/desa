<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    /**
     * CSRF Protection Method
     * Menggunakan 'session' agar lebih reliable di localhost/development.
     * Ganti ke 'cookie' saat production jika diperlukan.
     *
     * @var string 'cookie' or 'session'
     */
    public string $csrfProtection = 'session';

    /**
     * CSRF Token Randomization
     * Dinonaktifkan agar token konsisten dalam satu sesi.
     */
    public bool $tokenRandomize = false;

    /**
     * CSRF Token Name
     */
    public string $tokenName = 'csrf_token';

    /**
     * CSRF Header Name
     */
    public string $headerName = 'X-CSRF-TOKEN';

    /**
     * CSRF Cookie Name (dipakai jika csrfProtection = 'cookie')
     */
    public string $cookieName = 'csrf_cookie';

    /**
     * CSRF Expires (2 jam)
     */
    public int $expires = 7200;

    /**
     * CSRF Regenerate
     * false = token tidak berubah tiap request (lebih mudah di-debug)
     */
    public bool $regenerate = false;

    /**
     * CSRF Redirect on Failure
     * true = redirect ke halaman sebelumnya dengan pesan error (tidak crash)
     */
    public bool $redirect = true;
}
