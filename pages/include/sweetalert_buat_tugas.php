<!-- Sweet Alert [Berhasil tambah tugas] -->
<?php if (isset($_GET['success'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: '<?php echo htmlspecialchars($_GET['success']); ?>',
      showConfirmButton: false,
      timer: 1000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('success'); // Hapus parameter 'success' dari URL
      window.history.replaceState({}, '', url); // Perbarui URL tanpa reload
    });
  </script>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '<?php echo htmlspecialchars($_GET['error']); ?>',
      showConfirmButton: false,
      timer: 1000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('error'); // Hapus parameter 'error' dari URL
      window.history.replaceState({}, '', url); // Perbarui URL tanpa reload
    });
  </script>
<?php endif; ?>

<!-- Sweet Alert [Berhasil update tugas] -->
<?php if (isset($_GET['success'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: '<?php echo htmlspecialchars($_GET['success']); ?>',
      showConfirmButton: false,
      timer: 2000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('success');
      window.history.replaceState({}, '', url);
    });
  </script>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '<?php echo htmlspecialchars($_GET['error']); ?>',
      showConfirmButton: false,
      timer: 2000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('error');
      window.history.replaceState({}, '', url);
    });
  </script>
<?php endif; ?>

<!-- Sweet Alert [Delete tugas] -->
<?php if (isset($_GET['success'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: '<?php echo htmlspecialchars($_GET['success']); ?>',
      showConfirmButton: false,
      timer: 2000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('success');
      window.history.replaceState({}, '', url);
    });
  </script>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '<?php echo htmlspecialchars($_GET['error']); ?>',
      showConfirmButton: false,
      timer: 2000,
      customClass: {
        popup: 'swal-small'
      }
    }).then(() => {
      const url = new URL(window.location.href);
      url.searchParams.delete('error');
      window.history.replaceState({}, '', url);
    });
  </script>
<?php endif; ?>