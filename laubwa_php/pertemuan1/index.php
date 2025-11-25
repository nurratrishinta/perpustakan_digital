<?php
// Untuk mencetak/menampilkan teks, variabel, angka, HTML ke layar.
// 'echo' adalah perintah dasar untuk menampilkan output.
echo 'Hello World'; // Mencetak string 'Hello World'
echo '<br>'; // Mencetak tag HTML untuk baris baru
echo 'Hello World'; // Mencetak 'Hello World' lagi
echo '<br>'; // Baris baru
echo 'Hello World'; // Mencetak 'Hello World' lagi
echo '<br>'; // Baris baru

// Variabel adalah wadah untuk menyimpan data.
// Nama variabel dimulai dengan '$'.
$nama = 'John'; // Mendefinisikan variabel $nama dengan nilai string 'John'
$umur = '25'; // Mendefinisikan variabel $umur dengan nilai string '25'
// Mencetak string dengan menyisipkan variabel di dalamnya (menggunakan kutip ganda).
echo "Nama Saya : $nama <br>Umur Saya :$umur tahun";
echo '<br>'; // Baris baru

// Tipe data menentukan jenis nilai yang bisa disimpan oleh variabel.
$teks = "Hello"; // String (teks)
$number = 123; // Integer (bilangan bulat)
$pi = 3.14; // Float (bilangan desimal)
// $boolean = true/false; // Boolean (nilai kebenaran, bisa true atau false)

// Array adalah koleksi nilai yang diurutkan atau dinamai.
// Array terindeks (indeks dimulai dari 0).
$array = array("Apel", "pisang", "anggur");
echo $array[2]; // Mengakses dan mencetak elemen dengan indeks 2 (yaitu "anggur")
echo '<br>'; // Baris baru

// Sintaks array terindeks modern (PHP 5.4+).
$array2 = ["kucing", "kelinci", "kambing"];
echo $array2[2]; // Mengakses dan mencetak elemen dengan indeks 2 (yaitu "kambing")
echo '<br>'; // Baris baru

// Array asosiatif: Menggunakan kunci (string) daripada indeks numerik.
$associative_array = [
   "nama" => "john", // Kunci "nama" dengan nilai "john"
   "umur" => "25" // Kunci "umur" dengan nilai "25"
];
echo $associative_array["umur"]; // Mengakses dan mencetak nilai dengan kunci "umur" (yaitu "25")
echo '<br>'; // Baris baru

// Operator digunakan untuk melakukan operasi pada nilai atau variabel.
// Aritmatika: + (tambah), - (kurang), * (kali), / (bagi), % (modulus/sisa bagi).
$a = 10;
$b = 3;

$hasil = $a % $b; // Menghitung sisa bagi 10 dibagi 3 (hasilnya 1)
echo $hasil; // Mencetak 1
echo '<br>'; // Baris baru

// Penugasan: = (menetapkan nilai), +=, -=, *=, /= (shorthand untuk operasi dan penugasan).
// Contoh: $x += 5; sama dengan $x = $x + 5;

// Perbandingan: Digunakan untuk membandingkan dua nilai (menghasilkan true/false).
// == (sama dengan), === (identik/nilai dan tipe data sama), != (tidak sama dengan),
// > (lebih besar), < (lebih kecil), <= (lebih kecil atau sama dengan), >= (lebih besar atau sama dengan).

// Logika: Digunakan untuk menggabungkan ekspresi boolean.
// && (AND), || (OR), ! (NOT).

// Pengkondisian (If-Else): Mengeksekusi blok kode berdasarkan suatu kondisi.
$umur = 18;
if ($umur >= 20) { // Jika $umur lebih besar atau sama dengan 20
   echo "dewasa"; // Maka cetak "dewasa"
} else { // Jika kondisi di atas tidak terpenuhi
   echo "anak-anak"; // Maka cetak "anak-anak"
   echo '<br>'; // Baris baru
}

// Perulangan (Looping): Mengulang blok kode.

// While Loop: Mengulang selama kondisi yang ditentukan bernilai true.
$i = 0; // Inisialisasi variabel penghitung
while ($i < 5) { // Selama $i kurang dari 5
   echo "angka : $i||"; // Cetak "angka : [nilai $i]||"
   $i++; // Tambahkan $i dengan 1 (penting agar loop berhenti)
}
echo '<br>'; // Baris baru

// Do-While Loop: Blok kode dieksekusi setidaknya sekali, kemudian kondisi dievaluasi.
$u = 0; // Inisialisasi variabel penghitung
do {
   echo "angka : $u||"; // Cetak "angka : [nilai $u]||"
   $u++; // Tambahkan $u dengan 1
} while ($u < 5); // Selama $u kurang dari 5 (kondisi dievaluasi setelah blok do)
echo '<br>'; // Baris baru

// For Loop: Mengulang blok kode sejumlah tertentu.
// (Inisialisasi; Kondisi; Increment/Decrement)
for ($f = 0; $f < 5; $f++) { // Dari $f=0, selama $f<5, setiap iterasi $f bertambah 1
   echo "angka : $f||"; // Cetak "angka : [nilai $f]||"
}
echo '<br>'; // Baris baru

// Foreach Loop: Mengulang blok kode untuk setiap elemen dalam array.
$fruits = array("apel", "jeruk", "mangga"); // Mendefinisikan array $fruits
foreach ($fruits as $fruit) { // Untuk setiap elemen di $fruits, simpan nilainya ke $fruit
   echo "buah: $fruit ||"; // Cetak "buah: [nama buah] ||"
}
echo '<br>'; // Baris baru

// Fungsi (Function): Blok kode yang dapat digunakan kembali untuk melakukan tugas tertentu.
function greet()
{ // Mendefinisikan fungsi bernama 'greet'
   // Mengembalikan nilai string yang digabungkan. 'true' akan menjadi '1' saat digabungkan.
   return "Hello, john" . 23 . true;
}
echo greet(); // Memanggil fungsi 'greet' dan mencetak nilai yang dikembalikan
echo "<br>"; // Baris baru

// Fungsi dengan parameter: Menerima input saat dipanggil.
function tambah($a, $b)
{ // Mendefinisikan fungsi 'tambah' yang menerima dua parameter ($a, $b)
   return $a + $b; // Mengembalikan hasil penjumlahan $a dan $b
}
$hasil = tambah(5, 3); // Memanggil fungsi 'tambah' dengan nilai 5 dan 3, menyimpan hasilnya ke $hasil
echo $hasil; // Mencetak nilai $hasil (yaitu 8)