#!/bin/sh

# Baris ini untuk debugging: kita akan cetak nilai $PORT ke log
echo "Attempting to start server on PORT provided by Railway: $PORT"

# Jalankan server dengan variabel PORT
php artisan serve --host=0.0.0.0 --port=${PORT}
