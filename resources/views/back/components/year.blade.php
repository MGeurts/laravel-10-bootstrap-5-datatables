<select id="app_year" class="form-select" style="width: 110%">
    @for ($year = date('Y'); $year >= date('Y') - 4; $year--)
        <option value="{{ $year }}" @selected($year == Session::get('APP.YEAR'))>
            {{ $year }}
        </option>'
    @endfor
</select>

@section('scripts')
    @parent

    <script type="text/javascript">
        $(function() {
            /* -------------------------------------------------------------------------------------------- */
            if ($('#app_year').val() != new Date().getFullYear()) {
                $('#app_year').data("select2").$container.find(".select2-selection").addClass('bg-warning bg-opacity-50');
            }
            /* ------------------------------------------- */
            $('#app_year').change(function() {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('back.general.setValueSession') }}",
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
