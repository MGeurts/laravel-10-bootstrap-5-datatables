<select name="application_year" id="application_year" class="form-select form-select-lg">
    @for ($year = date('Y') + 1; $year >= date('Y') - 4; $year--)
        <option value="{{ $year }}" {{ $year == Session::get('APP.YEAR') ? 'selected' : '' }}>
            {{ $year }}
        </option>'
    @endfor
</select>

@section('scripts')
    @parent

    <script>
        $(function() {
            /* -------------------------------------------------------------------------------------------- */
            if ($('#application_year').val() != new Date().getFullYear()) {
                $('#application_year').data("select2").$container
                    .find(".select2-selection").addClass('bg-warning');
            }
            /* ------------------------------------------- */
            $('#application_year').change(function() {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.general.setValueSession') }}",
                    data: {
                        key: 'APP.YEAR',
                        value: $(this).val(),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
            /* -------------------------------------------------------------------------------------------- */
        });
    </script>
@endsection
