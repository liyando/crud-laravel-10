# mentah-laravel-10
# Crud Generator Laravel 9 dan 10 (penghemat waktu Anda)

Crud Generator Laravel adalah paket yang dapat Anda integrasikan di Laravel Anda untuk membuat CRUD NYATA. Itu termasuk:

- **Controller** with all the code already written
- **Views** (index, create, edit, show)
- **Model** with relationships
- **Request** file with validation rules
- **Migration** file

## Instalasi

Satu\. Jalankan perintah komposer berikut:

``` composer require liyando/crudgenlaravel --dev ```

2\. Jika Anda tidak menggunakan paket Laravel Collective Form di proyek Anda, instal:

``` composer require laravelcollective/html ```

<sub>(Catatan: Langkah ini tidak diperlukan jika Anda tidak memerlukan tampilan.)</sub>

3\. Publikasikan file konfigurasi dan direktori tema default untuk dilihat:

``` php artisan vendor:publish --provider="liyando\Crudgenlaravel\CrudgenServiceProvider" ```

## Penggunaan

### Buat CRUD (atau REST API)

Mari kita ilustrasikan dengan contoh kehidupan nyata : Membangun sebuah blog


`Postingan` dapat memiliki bidang `Title` dan `Content`

Ayo lakukan ini 🙂


#### Perintah pembangkit CRUD :

``` php artisan make:crud nameOfYourCrud "column1:type, column2" ``` (theory)

``` php artisan make:crud post "title:string, content:text" ``` (Contoh)

### Migrasi

Kedua file migrasi dibuat di direktori **database/migrasi** Anda. Jika perlu edit dan jalankan:
   
``` php artisan migrate ```
### Pengendali

File pengontrol dibuat di direktori **app/Http/Controllers** Anda. Semua metode (mengindeks, membuat, menyimpan, menampilkan, mengedit, memperbarui, menghancurkan) diisi dengan bidang Anda.

### Rute

Untuk membuat rute untuk pengontrol baru ini, Anda dapat melakukan ini:

``` Route::resource('posts', PostsController::class); ``` <sub><sup>(don't forget to import your `PostsController` in your `web.php` file)</sup></sub>


### Meminta

File permintaan dibuat di direktori **app/Http/Requests** Anda. Secara default, semua bidang wajib diisi, Anda dapat mengeditnya sesuai kebutuhan Anda.

### Penayangan


Anda dapat membuat tampilan secara independen dari generator CRUD dengan:
``` php artisan make:views nameOfYourDirectoryViews "column1:type, column2" ```



Selesai 🎉

## Hapus CRUD

Anda dapat menghapus semua file (kecuali migrasi) yang dibuat oleh perintah `make:crud` kapan saja. Tidak perlu menghapus file secara manual:

``` php artisan rm:crud nameOfYourCrud --force ```

``` php artisan rm:crud post --force ``` (dalam contoh kita)

Bendera `--force` (opsional) menghapus semua file tanpa konfirmasi


## Lisensi

Paket ini dilisensikan di bawah [lisensi MIT](http://opensource.org/licenses/MIT).
