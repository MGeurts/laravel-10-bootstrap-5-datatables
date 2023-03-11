<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">Hyperlinks</div>

            <div class="col fs-5 text-end">
                <img src="{{ asset('img/icons/link.png') }}" />
                <img src="{{ asset('img/icons/home.png') }}" />
            </div>
        </div>
    </div>

    <div class="card-body">
        You could use this card to display all kind of <b>hyperlinks</b> or buttons to navigate quickly to certain parts
        of your applcation.
        <hr />
        This application is <a href="https://www.php.net/" target="_blank">PHP 8.1</a> compatible and build using :
        <ul>
            <li><a href="https://laravel.com/" target="_blank">Laravel 10</a></li>
            <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap 5</a></li>
            <li><a href="https://datatables.net/" target="_blank">DataTables</a></li>
        </ul>
        <hr />
        <b>Features</b> :
        <ul>
            <li><b>Top button bar</b> to quickly navigate to the main parts of your application</li>
            <li><b>Offcanvas menu</b> to access less frequently used parts</li>
            <li><b>Datatables</b>, fully integrated with build in :</li>
            <ul>
                <li>Create - Show - Update - Delete (CRUD) with
                    <a href="http://bootboxjs.com/" target="_blank">Bootbox.js</a> dialogs and
                    <a href="https://codeseven.github.io/toastr/" target="_blank">Toastr</a> notifications
                </li>
                <li>Copy to clipboard</li>
                <li>Export to PDF and Excel</li>
                <li>Print function</li>
                <li>Items per page selector</li>
                <li>Column visibility selector</li>
                <li>Search with result highlighting</li>
                <li>Server-side pagination and filtering</li>
                <li>Multiple row selection (for mass deletes)</li>
                <li>Inline boolean field toggable</li>
                <li>Help</li>
            </ul>
        </ul>
        <hr />
        <b>Special feature</b> :
        <p>The top menu contains in its center a dropdown selector for the year. This is implemented as a global session
            variable <b>[APP].[YEAR]</b> and allows you to easely filter datatable datasets (when needed) to reflect the
            data concerning the selected year. This is extreem helpfull if you manage models that depend on the year,
            like for instance deliveries, orders, productions, and so on...
        </p>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col text-danger">
                <h5 id="MyClockTime" onload="showDate();"></h5>
            </div>

            <div class="col text-end">
                <h5 id="MyClockDate" onload="showDate();"></h5>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent

    <script type="text/javascript">
        $(function() {
            /* -------------------------------------------------------------------------------------------- */
            showTime();
            showDate();

            function showTime() {
                var now = dayjs();

                var h = now.hour();
                var m = now.minute();
                var s = now.second();

                if (h == 0 && m == 0 && s == 0) {
                    showDate();
                }

                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;

                var time = h + ":" + m + ":" + s;
                document.getElementById("MyClockTime").textContent = time;

                setTimeout(showTime, 1000);
            }

            function showDate() {
                var now = dayjs();

                var d = now.date();
                var m = now.month() + 1;
                var y = now.year();

                d = (d < 10) ? "0" + d : d;
                m = (m < 10) ? "0" + m : m;

                var date = d + "-" + m + "-" + y;
                document.getElementById("MyClockDate").textContent = date;
            }
            /* -------------------------------------------------------------------------------------------- */
        });
    </script>
@endsection
