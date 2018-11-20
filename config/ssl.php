<?php

return [
    'nginx_certificate_path' => env('SSL_CERTIFICATE_PATH'),
    'nginx_certificate_key_path' => env('SSL_CERTIFICATE_KEY_PATH'),

    'local_certificate_path' => base_path('.ssh/fullchain.pem'),
    'local_certificate_key_path' => base_path('.ssh/privkey.pem'),
];
