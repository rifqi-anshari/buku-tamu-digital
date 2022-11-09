<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <a href="logout.php" type="button" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>





<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap4.min.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#pesan").fadeIn('slow');
        }, 500);
    });
    setTimeout(function() {
        $("#pesan").fadeOut('slow');
    }, 7000);
</script>

<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
        $('#example3').DataTable()
    })
</script>

<!-- Page level custom scripts -->
<script src="js/datatables-demo.js"></script>
<footer class="fixed-bot text-center text-black bg-warning">
    <span>&copy; 2021 - RIFQI ANSHARI</span>
</footer>


</body>

</html>