<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('assets/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{ asset('assets/js/charts-home.js') }}"></script>
<script src="{{ asset('assets/js/front.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- replace it by local Font Awesome-->
<!-- <script src="https://use.fontawesome.com/99347ac47f.js"></script> -->
<!-- <script src="js/fontawesome.com/8918b93e7b.js"></script> -->
<script src="{{ asset('assets/js/fontawesome.js') }}"></script>
<!-- <script src="https://kit.fontawesome.com/8918b93e7b.js"></script> -->
<!-- Required datatable js -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
<!-- Key Tables -->
<script src="{{ asset('assets/js/dataTables.keyTable.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Selection table -->
<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/js/jquery.app.js') }}"></script>
<!-- for custom.js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Customer JS -->
@stack('js')

<script type="text/javascript">
    $(document).ready(function() {

        // Default Datatable
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

    window.onload = function() {
        @if (session()->has('message'))
            @if (session('type') == 'success')
                alert('{{ session('message') }}');
            @endif
            @if (session('type') == 'warning')
                alert('{{ session('message') }}');
            @endif
            @if (session('type') == 'danger')
                alert('{{ session('message') }}');
            @endif
        @endif

        $(document).on("change", ".file-preview", function() {
            var previewDiv = $(this).attr("data-previewDiv");
            if (previewDiv) {
                $('#' + previewDiv).html('');
                var base_url = $('meta[name="base-url"]').attr('content');
                if (this.files && this.files[0]) {
                    $('#' + previewDiv).html(
                        `<img src="${base_url}/image/image_loading.gif" style="height:80px; width: 120px" class="profile-user-img img-responsive img-rounded  "/>`
                    );
                    var reader = new FileReader();

                    if (this.files[0].size > 3000000) {
                        input.value = '';
                        $('#' + previewDiv).html('');
                    } else {
                        reader.onload = function(e) {
                            $('#' + previewDiv).html('<img src="' + e.target.result +
                                '" style="height:80px; width: 120px" class="profile-user-img img-responsive img-rounded  "/>'
                            );
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                }
            }

        })
    }
</script>
