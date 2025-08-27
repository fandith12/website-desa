import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Jalankan skrip setelah semua konten halaman dimuat
document.addEventListener('DOMContentLoaded', function () {

    // Temukan semua tombol yang berfungsi sebagai pembuka dropdown
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    // Tambahkan event listener untuk setiap tombol
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (event) {
            // Mencegah link default (agar tidak pindah halaman saat diklik)
            event.preventDefault();

            // Dapatkan menu dropdown yang berhubungan dengan tombol ini
            const currentMenu = this.nextElementSibling;
            
            // Tutup semua dropdown LAIN yang mungkin sedang terbuka
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== currentMenu) {
                    menu.classList.remove('show');
                    // Hapus juga class 'active' dari tombolnya agar ikon kembali normal
                    menu.previousElementSibling.classList.remove('active');
                }
            });

            // Buka atau tutup dropdown yang diklik saat ini
            currentMenu.classList.toggle('show');
            // Tambah atau hapus class 'active' untuk memutar ikon panah
            this.classList.toggle('active');
        });
    });

    // Tambahkan event listener ke seluruh window untuk menutup dropdown
    // saat pengguna mengklik di luar area dropdown
    window.addEventListener('click', function (event) {
        // Cek apakah yang diklik BUKAN bagian dari komponen dropdown
        if (!event.target.closest('.nav-dropdown')) {
            // Jika ya, tutup semua dropdown yang sedang terbuka
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
                menu.previousElementSibling.classList.remove('active');
            });
        }
    });
    
    const hamburgerButton = document.getElementById('hamburger-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburgerButton && mobileMenu) {
        hamburgerButton.addEventListener('click', function() {
            // Toggle class 'active' pada tombol dan menu
            hamburgerButton.classList.toggle('active');
            mobileMenu.classList.toggle('active');

            // Mencegah body di-scroll saat menu mobile terbuka
            if (mobileMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
    }
});
