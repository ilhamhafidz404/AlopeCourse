<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = Blog::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition() {
    return [
      'judul' => $this->faker->sentence(rand(2, 3)),
      'slug' => Str::slug($this->faker->sentence(rand(2, 3)), "-"),
      'thumbnail' => 'default.jpg',
      'category_id' => rand(1, 3),
      'status' => "upload",
      'content' => "<p>HTML memang bahasa yang <strong>wajib dipelajari</strong>, bagi yang mau menjadi web developer.</p>

      <p>Karena&hellip;</p>
      
      <p>HTML merupakan bahasa dasar untuk membuat web.</p>
      
      <p>Saya yakin, kamu sudah pernah mendengar HTML sebelumnya. Tapi tidak ada salahnya membaca kebali artikel ini.</p>
      
      <p>Pada tutorial ini, kita akan benar-benar membahas dari nol hingga kamu bisa membuat halaman HTML sendiri.</p>
      
      <p>Baiklah&hellip;</p>
      
      <p>Mari kita mulai!</p>
      
      <h2>Apa itu HTML?</h2>
      
      <p>Mari kita lihat pengertian HTML menurut wikipedia:</p>
      
      <blockquote>
      <p>HTML atau <em>HyperText Markup Language</em> merupakan sebuah bahasa <a href='https://kbbi.web.id/markah' target='_blank'><em>markah</em></a> untuk membuat halaman web.</p>
      </blockquote>
      
      <p>Paham kan maksudnya?</p>
      
      <p>Kalau belum paham, sini saya jelaskan&hellip;</p>
      
      <p>Jadi, HTML itu adalah <em><strong>sebuah bahasa</strong></em> yang menggunakan <em><strong>markup</strong></em> atau penanda untuk <em><strong>membuat halaman web</strong></em>.</p>
      
      <p>Penanda atau <em>markup</em> ini, nanti akan kita sebut dengan <strong>Tag</strong>.</p>
      
      <p>HTML berperan untuk menentukan struktur konten dan tampilan dari sebuah web.</p>
      
      <p>Kalau kita ibaratkan nih..</p>
      
      <p>HTML itu seperti batu bata untuk membangun rumah. Batu bata ini dapat disusun, hingga menjadi fondasi dasar.</p>
      
      <p>Dalam membuat halaman web, HTML tidak sendirian. Ada bahasa lain lagi yang menjadi pelengkapnya, yakni CSS dan Javascript.</p>
      
      <p>CSS adalah bahasa khusus yang digunakan untuk memperindah tampilan web.</p>
      
      <p>Lalu Javascript bertugas untuk membuat halaman web menjadi hidup. Karena dengan Javascript, kita dapat menentukan fungsi-fungsi maupun efek yang akan diterapkan di website.</p>
      
      <p>Oh iya, pada tutorial ini.. Kita akan fokus dulu membahas HTML. Jika kamu ingin belajar CSS dan Javascript, silahkan buka:</p>
      
      <ul>
        <li><a href='https://www.petanikode.com/topik/css/'>Tutorial CSS untuk Pemula</a></li>
        <li><a href='https://www.petanikode.com/tutorial/javascript/'>Tutorial Javascript untuk Pemula</a></li>
      </ul>
      
      <p>Oke, saya anggap kamu sudah paham tentang apa itu HTML serta peranannya dalam pembuatan web.</p>
      
      <p>Berikutnya, biar lebih paham.. kita akan membahas sejarah dan asal-usul HTML.</p>
      
      <h2>Sejarah dan Asal-usul HTML</h2>
      
      <p>Sejarah lengkap HTML bisa juga dibaca di:</p>
      
      <ul>
        <li><a href='https://www.petanikode.com/html-sejarah/'>Sejarah dan Asal Usul HTML</a></li>
      </ul>
      
      <p>Pada tutiorial ini, kita akan bahas sejarahnya secara singkat.</p>
      
      <p>Cerita awal kemunculan HTML dimulai dari tahun 1980..</p>
      
      <p>Saat itu seorang ilmuan bernama Tim Berners-Lee sedang bekerja di CERN.</p>
      
      <p>CERN sendiri bukanlah perusahaan yang berkaitan tentang teknologi maupun internet. CERN adalah singkatan dari bahasa prancis: <em>Conseil Europ&eacute;en pour la Recherche Nucl&eacute;aire</em>.</p>
      
      <p>Yang artinya: Komisi Eropa untuk Penelitian Fisika Nuklir.</p>
      
      <p>Para peneliti di CERN membutuhkan sebuah cara atau sistem agar bisa saling berbagi dokumen hasil penelitian.</p>
      
      <p>Tim kemudian mencoba membuat ENQUIRE. Ini adalah software <em>hypertext</em> yang akan digunakan untuk berbagi dokumen.</p>
      
      <p>Lalu di tahun 1989, Tim memperkenalkan ide tentang <em>hypertext</em> berbasis internet. Ini nantinya akan menjadi cikal-bakal HTML.</p>
      
      <p>Tim kemudian memulai proyek baru dengan rekannya Robert Cailliau yang merupakan <em>system engineer</em> di CERN. Akan tetapi proyek ini tidak resmi diadopsi oleh CERN.</p>
      
      <p>Pada akhir tahun 1991, Tim Berners-Lee menerbitkan dokumen yang berjudul: <a href='http://info.cern.ch/hypertext/WWW/MarkUp/Tags.html' target='_blank'>&ldquo;HTML Tags&rdquo;</a></p>
      
      <p>.</p>
      
      <p>Dokumen ini berisi penjelasan tentang 18 tags awal yang menjadi konsep dasar HTML.</p>
      
      <p>HTML sebenarnya dirancang berdasarkan pada konsep bahasa markup yang dikenal dengan SGML <em>(Standard Generalized Markup Language)</em>.</p>
      
      <p>SGML adalah sebuah standar internasional untuk membuat dokumen dengan tanda <em>(markup)</em> seperti paragraf, list, heading, dan lain-lain.</p>
      
      <p>Bisa dibilang..</p>
      
      <p>HTML adalah implementasi dari SGML.</p>
      
      <p>Kalau kita lihat, beberapa tag seperti <code>&lt;title&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;li&gt;</code>, dan <code>&lt;h1&gt;</code> sampai <code>&lt;h6&gt;</code> berasal dari SGML. Namun, tidak semua yang ada di HTML berasal dari SGML.</p>
      
      <p>Salah satunya adalah <a href='https://www.petanikode.com/html-link/'>Hyperlink</a>, yang murni hasil pemikiran Tim Berners-Lee.</p>
      
      <p>Ide tentang HTML ini kemudian disebarkan ke dalam sebuah mailing list dan segera menjadi perhatian berbagai ilmuwan komputer di seluruh dunia.</p>
      
      <h3>Perkembangan dan Versi HTML</h3>
      
      <p>HTML punya beberapa versi, dari versi yang paling tua hingga yang terbaru. Berikut ini perkembangan versi HTML:</p>
      
      <ul>
        <li><code>[Draft]</code> <strong>HTML 1.0</strong> <em>(Juni 1993)</em> adalah versi HTML pertama, namun tidak resmi dirilis;</li>
        <li><strong>HTML 2.0</strong> <em>(24 November 1995)</em> adalah versi HTML kedua yang resmi pertamakali beredar di pasaran dan dirilis oleh IETF;</li>
        <li><code>[Draft]</code> <strong>HTML 3.0</strong> <em>(28 Maret 1995)</em> versi ini gagal beredar, karena banyak perubahan yang memicu perdebatan;</li>
        <li><strong>HTML 3.2</strong> <em>(14 Januari 1997)</em> versi resmi yang dirilis W3C pertamakali.</li>
        <li><strong>HTML 4.0</strong> <em>(24 April 1998)</em> versi pengembangan dari yang seblumnya;</li>
        <li><strong>HTML 4.01</strong> <em>(24 Desember 1999)</em> versi perbaikan dari HTML 4.0;</li>
        <li><strong>XHTML 1.0</strong> <em>(26 Januari 2000)</em> pengembangan dari HTML 4.01 dengan mengadopsi XML;</li>
        <li><strong>XHTML 2.0</strong> <em>(Augustus 2002&mdash;Juli 2006)</em> versi kedua dari XHTML;</li>
        <li><strong>HTML 5</strong> <em>(28 Oktober 2014)</em> versi html saat ini.</li>
      </ul>
      
      <p>Versi <code>[draft]</code> adalah versi yang tidak resmi dirilis ke pasaran. Bentuknya cuma masih dalam draft speksifikasi saja.</p>
      
      <p>Artinya..</p>
      
      <p>Tidak ada yang menggunakan versi <code>[draft]</code> untuk membuat web.</p>
      
      <p>Lalu, versi mana yang akan kita pakai?</p>
      
      <p>Tentunya versi terbaru, yakni HTML 5.</p>
      
      <h2>Peralatan untuk Belajar HTML</h2>
      
      <p>Nah, sekarang.. Tiba saatnya kita praktik!</p>
      
      <p>Tapi sebelum itu, kamu harus siapkan beberapa alat yang akan digunakan untuk praktik.</p>
      
      <p>Adapun peralatan yang harus kamu persiapkan adalah:</p>
      
      <h3>1. Teks Editor untuk Menulis HTML</h3>
      
      <p>Teks editor akan kita gunakan untuk menulis kode-kode HTML. Kamu bebas menggunakan teks editor apapun.</p>
      
      <p>Notepad boleh, Notepad++ juga boleh..</p>
      
      <p>&nbsp;</p>
      
      <p>Apapun teks editornya, yang penting bisa digunakan untuk membuat dan menulis dokumen HTML.</p>
      
      <p>Namun, pada tutorial ini.. kita akan menggunakan teks editor <a href='https://www.petanikode.com/text-editor-vscode/'>Visual Studio Code</a>.</p>
      
      <h3>2. Web Browser untuk Membuka HTML</h3>
      
      <p>Web browser akan kita gunakan untuk membuka HTML. Kamu juga bebeas menggunakan web browser apapun.</p>
      
      <p>Saran saya sih.. gunakan web browser yang terbaru, karena kita juga akan menggunakan HTML versi yang terbaru.</p>
      
      <p>Firefox atau Google Chrome, saya kira sudah cukup.</p>
      
      <h2>Membuat Dokumen HTML Pertamamu</h2>
      
      <p>Kini tiba saatnya, kamu harus mencoba sendiri membuat dokumen HTML. Caranya sangat mudah.</p>
      
      <p>Mari kita mulai dengan membuka teks editor, lalu tulislah kode berikut.</p>
      
      <p>&nbsp;</p>
      
      <pre>
      <code class='language-css'>
.form-control
{
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    display: block;
    width: 100%;
    height: calc(1.5em + 1.25rem + 2px);
    padding: .625rem .75rem;
    transition: all .15s cubic-bezier(.68, -.55, .265, 1.55); 
    color: #8898aa;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: 0 3px 2px rgba(233, 236, 239, .05);
}
.input-group-text
{
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    display: flex;
    margin-bottom: 0;
    padding: .625rem .75rem;
    text-align: center;
    white-space: nowrap;
    color: #adb5bd;
    border: 1px solid #dee2e6;
    border-radius: .25rem; 
    background-color: #fff;
    align-items: center;
}
</code>
</pre>
      
      <p><strong>Tips:</strong> buat kamu yang menggunakan Notepad di Windows, simpanlah nama filenya dengan menggunakan tanda petik <code>&quot;hello-world.html&quot;</code> agar ekstensinya <code>.html</code>, bukan <code>.txt</code>.</p>
      
      <p>Atau kamu bisa aktifkan fitur <em>show extension</em> pada Windows Explorer, agar bisa tahu ekstensi filenya.</p>
      
      <p>Caranya.. masuk ke menu View, lalu centang <strong>File name extensions</strong>.</p>
      
      <p>Selamat! 🎉</p>
      
      <p>Kita sudah berhasil membuat halaman web pertama dengan HTML.</p>
      
      <p>Kini giliran saya menjelaskan maksud dari kode di atas, tapi sebelum itu.. saya akan jelaskan dulu tentang nama file untuk HTML.</p>
                ",
    ];
  }
}