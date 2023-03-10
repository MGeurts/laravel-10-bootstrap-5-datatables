<!-- Laravel Fortify -->
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<!-- notification toastr -->
@if (session('notification'))
    <script>
        showToast({
            type: "{{ Session::get('notification')['type'] }}",
            title: "{{ Session::get('notification')['title'] }}",
            message: "{{ Session::get('notification')['message'] }}"
        });
    </script>
@endif
