@if (session('alert'))
    <script>
        let alertInfo = @json(session('alert')); //convert array to object
        Swal.fire(
            alertInfo.title,
            alertInfo.message,
            alertInfo.icon,
        )
    </script>
@endif
