@if (session('notification'))
    <script>
        // toastr.options = {
        //     "positionClass": "toast-top-right"
        // };
        // toastr.{{ session('notification')['type'] }}("{{ session('notification')['message'] }}");
        
        //  Notify
        $.notify({
            icon: 'icon-bell',
            title: 'Kaiadmin',
            message: 'Premium Bootstrap 5 Admin Dashboard',
        }, {
            type: 'secondary',
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });
    </script>
@endif
