<?php

namespace App\Http\Controllers\v1_0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CertificateController extends Controller
{
    public function get()
    {
        try {
            $certificate = file_get_contents(config('ssl.local_certificate_path'));
            $certificateKey = file_get_contents(config('ssl.local_certificate_key_path'));
        } catch (\ErrorException $exception) {
            return response()->json([], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json([
            'ssl_certificate' => [
                'certificate' => $certificate,
                'certificate_key' => $certificateKey
            ]
        ]);
    }
}
