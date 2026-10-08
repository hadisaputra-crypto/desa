<?php

if (!function_exists('kirim_email_akun')) {
    /**
     * Kirim email notifikasi akun (tambah/edit)
     *
     * @param string $ke        Alamat email tujuan
     * @param string $nama      Nama penerima
     * @param string $username  Username login
     * @param string $password  Password (plain text, hanya untuk akun baru)
     * @param string $tipe      'tambah' | 'edit'
     * @return bool|string      true jika berhasil, string pesan error jika gagal
     */
    function kirim_email_akun(string $ke, string $nama, string $username, string $password = '', string $tipe = 'tambah')
    {
        $email = \Config\Services::email();

        $subject = ($tipe === 'tambah')
            ? '🎉 Akun BUMDes Digital Anda Telah Dibuat'
            : '✏️ Informasi Akun BUMDes Digital Diperbarui';

        $appUrl = rtrim(base_url(), '/');
        $tahun  = date('Y');

        if ($tipe === 'tambah') {
            $bodyContent = "
                <p>Halo, <strong>" . esc($nama) . "</strong>!</p>
                <p>Akun Anda di <strong>BUMDes Digital</strong> telah berhasil dibuat. Berikut adalah detail login Anda:</p>
                <table width='100%' cellpadding='0' cellspacing='0' style='margin:20px 0;'>
                    <tr>
                        <td style='padding:12px 16px;background:#f0f7ff;border-radius:8px 8px 0 0;border:1px solid #dbeafe;'>
                            <table width='100%'>
                                <tr>
                                    <td width='140' style='color:#64748b;font-size:13px;'>Username</td>
                                    <td style='font-weight:700;color:#1e293b;font-size:15px;letter-spacing:0.5px;'>" . esc($username) . "</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding:12px 16px;background:#fff;border-radius:0 0 8px 8px;border:1px solid #dbeafe;border-top:none;'>
                            <table width='100%'>
                                <tr>
                                    <td width='140' style='color:#64748b;font-size:13px;'>Password</td>
                                    <td style='font-weight:700;color:#1565c0;font-size:15px;font-family:monospace;letter-spacing:1px;'>" . esc($password) . "</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <p style='margin:20px 0;'>
                    <a href='{$appUrl}/auth/login' style='display:inline-block;background:#1565c0;color:#fff;padding:12px 28px;border-radius:8px;text-decoration:none;font-weight:600;font-size:14px;'>
                        🔐 Login Sekarang
                    </a>
                </p>
                <div style='background:#fff8e1;border-left:4px solid #f59e0b;padding:12px 16px;border-radius:0 6px 6px 0;margin:20px 0;'>
                    <strong style='color:#92400e;'>⚠️ Penting:</strong>
                    <span style='color:#78350f;'> Segera ganti password Anda setelah login pertama kali untuk keamanan akun.</span>
                </div>
            ";
        } else {
            $passInfo = $password
                ? "<tr><td style='padding:8px 0;'><strong>Password Baru:</strong> <code style='background:#f1f5f9;padding:2px 8px;border-radius:4px;font-family:monospace;color:#1565c0;'>" . esc($password) . "</code></td></tr>"
                : '';
            $bodyContent = "
                <p>Halo, <strong>" . esc($nama) . "</strong>!</p>
                <p>Data akun Anda di <strong>BUMDes Digital</strong> telah diperbarui. Berikut adalah informasi terbaru:</p>
                <table width='100%' cellpadding='0' cellspacing='0' style='margin:20px 0;background:#f0f7ff;border:1px solid #dbeafe;border-radius:8px;'>
                    <tr>
                        <td style='padding:16px;'>
                            <table width='100%'>
                                <tr>
                                    <td style='padding:8px 0;'><strong>Nama:</strong> " . esc($nama) . "</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px 0;'><strong>Username:</strong> <code style='background:#fff;padding:2px 8px;border-radius:4px;font-family:monospace;'>" . esc($username) . "</code></td>
                                </tr>
                                {$passInfo}
                            </table>
                        </td>
                    </tr>
                </table>
                <p>Jika Anda merasa tidak melakukan perubahan ini, segera hubungi administrator.</p>
            ";
        }

        $body = "
        <!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$subject}</title>
        </head>
        <body style='margin:0;padding:0;font-family:\"Segoe UI\",Arial,sans-serif;background:#f1f5f9;'>
            <table width='100%' cellpadding='0' cellspacing='0' style='min-height:100vh;background:#f1f5f9;'>
                <tr>
                    <td align='center' style='padding:40px 20px;'>
                        <table width='100%' style='max-width:560px;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(21,101,192,.12);'>

                            <!-- Header -->
                            <tr>
                                <td style='background:linear-gradient(135deg,#0d47a1 0%,#1565c0 100%);padding:32px 40px;text-align:center;'>
                                    <h1 style='margin:0;color:#fff;font-size:22px;font-weight:700;letter-spacing:-0.3px;'>BUMDes Digital</h1>
                                    <p style='margin:6px 0 0;color:rgba(255,255,255,.8);font-size:13px;'>Sistem Manajemen BUMDes</p>
                                </td>
                            </tr>

                            <!-- Body -->
                            <tr>
                                <td style='padding:36px 40px;color:#334155;font-size:15px;line-height:1.7;'>
                                    <h2 style='margin:0 0 20px;font-size:18px;color:#0d47a1;'>{$subject}</h2>
                                    {$bodyContent}
                                </td>
                            </tr>

                            <!-- Footer -->
                            <tr>
                                <td style='background:#f8fafc;padding:20px 40px;border-top:1px solid #e2e8f0;text-align:center;'>
                                    <p style='margin:0;color:#94a3b8;font-size:12px;'>
                                        Email ini dikirim otomatis oleh sistem &mdash; mohon jangan dibalas.<br>
                                        &copy; {$tahun} BUMDes Digital. Semua hak dilindungi.
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ";

        try {
            $email->setTo($ke, $nama);
            $email->setSubject($subject);
            $email->setMessage($body);
            $email->setMailType('html');

            if (!$email->send(false)) {
                return $email->printDebugger(['headers']);
            }
            return true;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}
