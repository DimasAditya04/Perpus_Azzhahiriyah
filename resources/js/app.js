import './bootstrap';

import Alpine from 'alpinejs';
import swal from 'sweetalert2';
window.Alpine = Alpine;
window.swal = swal;
Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    // Pilih elemen berdasarkan ID yang baru kita tambahkan
    const contactAdminLink = document.getElementById('contactadmin');

    if (contactAdminLink) {
        contactAdminLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tautan (gulir ke atas halaman karena href="#")

            Swal.fire({
                icon: 'info',
                title: 'Fitur Akan Segera Tiba',
                timer: 2500,
                text: 'Mohon maaf, fitur ini masih dalam pengembangan. Silakan hubungi admin secara manual untuk saat ini.',
                
            });
        });
    }
});

