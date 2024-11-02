<form action="{{ $route }}" method="POST" style="display:inline;" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline">
        <i class="fas fa-trash"></i>
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.delete-form');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim form
                        form.submit();

                        // Menampilkan notifikasi
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data sudah terhapus.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6'
                        });
                    }
                });
            });
        });
    });
</script>
