<?php
declare(strict_types=1);

/**
 * Semua isi portofolio ada di file ini.
 * Ubah teks/link di sini, tampilan otomatis ikut berubah.
 */
return [
    'profile' => [
        'name'    => 'Fillial Anugrah M',
        'title'   => 'IT / Web Developer',
        'roles'   => ['IT / Web Developer', 'Laravel Developer', 'Fresh Graduate Informatika'],
        'intro'   => 'Fresh graduate S1 Informatika (2026) yang terbiasa membangun website dengan PHP, Laravel, dan MySQL. Siap belajar dan berkontribusi dalam tim IT.',
        'email'   => 'fillialawokawok@gmail.com',
        'phone'   => '085702316207',
        'address' => 'Desa Bojongwetan, Kec. Bojong, Kab. Pekalongan, Jawa Tengah',
        'photo'   => 'assets/img/foto.jpg',
        'year'    => 2026,
    ],

    'socials' => [
        ['icon' => 'i-gh', 'label' => 'GitHub',    'url' => 'https://github.com/mbojong11',                                          'handle' => 'mbojong11'],
        ['icon' => 'i-in', 'label' => 'LinkedIn',  'url' => 'https://www.linkedin.com/in/fillial-anugrah-mirro-uf-388081439/',       'handle' => 'Fillial Anugrah'],
        ['icon' => 'i-ig', 'label' => 'Instagram', 'url' => 'https://www.instagram.com/itsfylx_',                                    'handle' => '@itsfylx_'],
        ['icon' => 'i-tt', 'label' => 'TikTok',    'url' => 'https://www.tiktok.com/@fialexclsv',                                     'handle' => '@fialexclsv'],
    ],

    'nav' => [
        ['#home', 'Home'], ['#tentang', 'Tentang'], ['#kerja', 'Kerja'],
        ['#keahlian', 'Keahlian'], ['#proyek', 'Proyek'],
    ],

    'marquee' => 'Portofolio ✦ Web Developer ✦ Laravel ✦ Portofolio ✦ Web Developer ✦ Laravel ✦',

    'about' => [
        'quote' => 'Siap belajar dan berkontribusi dalam tim IT.',
        'text'  => 'Fresh graduate S1 Informatika (2026) dengan pemahaman dasar pemrograman PHP, Java, JavaScript, C++, dan framework Laravel, didukung pengalaman membangun beberapa project website berbasis studi kasus nyata selama kuliah. Terbiasa bekerja dengan MySQL, Figma, dan GitHub. Kemampuan pendukung berupa desain grafis (Canva, AI prompt) serta pengalaman kerja di bidang retail dan konten digital membentuk kemampuan komunikasi dan adaptasi cepat terhadap hal baru.',
        'stats' => [
            ['to' => '3.32', 'dec' => 2, 'label' => 'IPK'],
            ['to' => '5',    'dec' => 0, 'label' => 'Project'],
            ['to' => '3',    'dec' => 0, 'label' => 'Pengalaman'],
        ],
        'education' => [
            ['2022 – 2026',    'ITS NU Pekalongan',        'S1 Informatika · IPK 3.32'],
            ['LULUS 2022',     'SMA Negeri 1 Bojong',      'Sekolah menengah atas.'],
            ['ANGKATAN 2019',  'SMP Negeri 1 Pekalongan',  'Sekolah menengah pertama.'],
        ],
    ],

    'jobs' => [
        ['year' => '2026', 'title' => 'Desain Grafis', 'org' => 'Mbojongz',
         'desc' => 'Membuat desain visual (poster, konten promosi, dll) dengan Canva dan AI prompt, serta mendukung kebutuhan dokumentasi dan promosi visual.'],
        ['year' => '2026', 'title' => 'Live TikTok', 'org' => 'Fune Store',
         'desc' => 'Live streaming untuk promosi produk dan interaksi dengan audiens, membuat konten visual, dan mengasah komunikasi publik serta kepercayaan diri.'],
        ['year' => '2023', 'title' => 'Penjaga Toko', 'org' => 'Toko Akbar',
         'desc' => 'Melayani transaksi dan kebutuhan pelanggan, mengelola stok barang, serta menjaga kerapian tampilan toko.'],
    ],

    // Enam ikon untuk kubus yang berputar di bagian Skill
    'cube' => ['i-php', 'i-laravel', 'i-js', 'i-java', 'i-mysql', 'i-figma'],

    'skills' => [
        ['title' => 'Bahasa Pemrograman & Framework', 'items' => [
            ['i-php', 'PHP'], ['i-laravel', 'Laravel'], ['i-java', 'Java'], ['i-js', 'JavaScript'], ['i-cpp', 'C++'],
        ]],
        ['title' => 'Database', 'items' => [
            ['i-mysql', 'MySQL'], ['i-pma', 'phpMyAdmin'],
        ]],
        ['title' => 'Tools & Platform', 'items' => [
            ['i-figma', 'Figma'], ['i-gh', 'GitHub'], ['i-canva', 'Canva'], ['i-ai', 'AI Prompting'],
        ]],
        ['title' => 'Soft Skill', 'items' => [
            ['i-comm', 'Komunikasi'], ['i-team', 'Kerja Tim'], ['i-adapt', 'Adaptif'], ['i-idea', 'Problem Solving'],
        ]],
    ],

    'projects' => [
        ['title' => 'Website UMKM', 'desc' => 'Website untuk mendukung promosi dan operasional bisnis UMKM.',
         'chips' => ['PHP', 'Laravel', 'MySQL', 'Tugas Kuliah']],
        ['title' => 'Sistem Pendaftaran Mahasiswa', 'desc' => 'Sistem berbasis web untuk mengelola data pendaftar secara digital.',
         'chips' => ['Tugas Kuliah']],
        ['title' => 'Website Profil Sekolah', 'desc' => 'Website sebagai media informasi dan komunikasi sekolah.',
         'chips' => ['Tugas Kuliah']],
        ['title' => 'Sistem Informasi Rumah Sakit', 'desc' => 'Sistem berbasis web untuk pengelolaan data pasien dan administrasi rumah sakit.',
         'chips' => ['Tugas Kuliah']],
        ['title' => 'Sistem Informasi Perpustakaan', 'desc' => 'Sistem berbasis web untuk pengelolaan data buku dan peminjaman.',
         'chips' => ['Tugas Kuliah']],
    ],
];
