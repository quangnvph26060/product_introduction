
@if(session('notification'))
    <script>
        toastr.options = {
            "positionClass": "toast-top-right"
        };
        toastr.{{ session('notification')['type'] }}("{{ session('notification')['message'] }}");
    </script>
@endif