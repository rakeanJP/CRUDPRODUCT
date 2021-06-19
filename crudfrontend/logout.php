<?php
// kan di form sebelumnya yang bagian logoutnya di arahin ke halaman logout.php
// nah disini diatur sistem logoutnya

// fungsi session nya di mulai
@session_start();
// terus di hapus, jadi semua data di session ini dihapus
// kenapa harus dihapus soalnya biar nanti dia gaakan bisa masuk ke halaman (yang diijininnin cuman kalo dah login) lewat link
@session_destroy();
// tampilin alert berhasil logout terus redirect deh
echo "
    <script>
    alert('selamat tinggal');
    document.location.href='index.php'
    </script>
"
?>