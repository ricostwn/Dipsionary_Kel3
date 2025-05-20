import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import axios from 'axios';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('click', function(e) {
    const button = e.target.closest('.bookmark-button');
    if (!button) return;

    const istilah = button.dataset.istilah;
    const cara_baca = button.dataset.cara_baca;
    const penjelasan = button.dataset.penjelasan;

    // Disable tombol agar tidak spam klik
    if (button.disabled) return;
    button.disabled = true;

    axios.post('/bookmark', {
        istilah: istilah,
        cara_baca: cara_baca,
        penjelasan: penjelasan
    })
    .then(response => {
        if(response.data.success !== false){
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Istilah berhasil ditambahkan ke bookmark.',
                confirmButtonColor: '#3C3B6E'
            });
            button.classList.add('bg-green-600');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: response.data.message || 'Gagal menyimpan bookmark.',
                confirmButtonColor: '#3C3B6E'
            });
        }
    })
    .catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Gagal menyimpan bookmark. Anda harus login!',
            confirmButtonColor: '#3C3B6E'
        });
    })
    .finally(() => {
        button.disabled = false;
    });
});
