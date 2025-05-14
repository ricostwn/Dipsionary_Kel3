import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.bookmark-button');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const istilah = this.dataset.istilah;
            const cara_baca = this.dataset.cara_baca;
            const penjelasan = this.dataset.penjelasan;

            axios.post('/bookmark', {
                istilah: istilah,
                cara_baca: cara_baca,
                penjelasan: penjelasan
            })
            .then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Istilah berhasil ditambahkan ke bookmark.',
                    confirmButtonColor: '#3C3B6E'
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Gagal menyimpan bookmark. Anda harus login!',
                    confirmButtonColor: '#3C3B6E'
                });
            });
        });
    });
});