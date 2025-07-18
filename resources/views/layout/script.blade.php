<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('datum') }}/assets/js/backend-bundle.min.js"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('datum') }}/assets/js/customizer.js"></script>

<script src="{{ asset('datum') }}/assets/js/sidebar.js"></script>

<!-- Flextree Javascript-->
<script src="{{ asset('datum') }}/assets/js/flex-tree.min.js"></script>
<script src="{{ asset('datum') }}/assets/js/tree.js"></script>

<!-- Table Treeview JavaScript -->
<script src="{{ asset('datum') }}/assets/js/table-treeview.js"></script>

<!-- SweetAlert JavaScript -->
<script src="{{ asset('datum') }}/assets/js/sweetalert.js"></script>

<!-- Vectoe Map JavaScript -->
<script src="{{ asset('datum') }}/assets/js/vector-map-custom.js"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('datum') }}/assets/js/chart-custom.js"></script>
<script src="{{ asset('datum') }}/assets/js/charts/01.js"></script>
<script src="{{ asset('datum') }}/assets/js/charts/02.js"></script>

<!-- slider JavaScript -->
<script src="{{ asset('datum') }}/assets/js/slider.js"></script>

<!-- Emoji picker -->
<script src="{{ asset('datum') }}/assets/vendor/emoji-picker-element/index.js" type="module"></script>


<!-- app JavaScript -->
<script src="{{ asset('datum') }}/assets/js/app.js"></script>

{{-- Sweat Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Add alert -->
@if (session('successAdd'))
    <script>
        swal({
            icon: 'success',
            title: "Add Success!",
            text: "{{ session('successAdd') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('successUpdate'))
    <script>
        swal({
            icon: "success",
            title: "Update Success!",
            text: "{{ session('successUpdate') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('delete'))
    <script>
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ session('delete') }}", {
                        icon: "success",
                        button: false,
                        timer: 3500
                    });
                } else {
                    swal("Your data is safe!");
                }
            });
    </script>
@endif
<!-- /Alert -->
