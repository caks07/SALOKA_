document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.mySwiper', {
        // Konfigurasi Swiper di sini
        slidesPerView: 2, // Jumlah slide yang ditampilkan sekaligus
        spaceBetween: 30, // Jarak antara slide (dalam px)
        loop: true, // Mengaktifkan loop pada slider
        pagination: {
            el: '.swiper-pagination', // Menambahkan pagination
            clickable: true, // Membuat pagination dapat diklik
        },
        navigation: {
            nextEl: '.swiper-button-next', // Tombol navigasi ke slide berikutnya
            prevEl: '.swiper-button-prev', // Tombol navigasi ke slide sebelumnya
        },
        // Opsional: Efek transisi antara slide
        // Misalnya, gunakan coverflow effect
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0, // Rotasi slide dalam derajat
            stretch: 0, // Pemisahan antara slide (0 untuk tidak ada pemisahan)
            depth: 100, // Kedalaman slide
            modifier: 1, // Modifikasi efek coverflow
            slideShadows: true, // Mengaktifkan bayangan pada slide
        },
    });
});
