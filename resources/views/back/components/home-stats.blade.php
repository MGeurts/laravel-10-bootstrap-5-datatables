<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">Status <strong>{{ Session::get('APP.YEAR') }}</strong></div>

            <div class="col fs-5 text-end">
                <img src="{{ asset('img/icons/statistics.png') }}" />
                <img src="{{ asset('img/icons/home.png') }}" />
            </div>
        </div>
    </div>

    <div class="card-body">
        You could use this card to display all kind of <b>status</b> indicators to get a quick overview of your
        application.
        <hr />
        In this demo project, 2 models are already implemented :<br /><br />
        <ul>
            <li><a href="{{ route('back.customers.index') }}">Customers</a>, available to all logged in users</li>
            <li>
                <a href="{{ route('back.users.index') }}">Users</a>, only available to logged in users with the property <b>Developer</b>
            </li>
        </ul>
        <p>Use their controllers and the corresponding views as a base to create new datatables utilising your own project models.</p>
        <hr />
        <p>Open source under MIT License.</p>
        <hr />
        <br /><br /><br /><br /><br /><br /><br />
        <p>If you like this project, consider giving it a star on <a href="https://github.com/MGeurts/laravel-10-bootstrap-5-datatables" target="_blank">GitHub</a>. Thanks.</p>
        <p>Happy programming.</p>
        <div class="float-end">
            <table>
                <tr>
                    <td class="text-end">
                        Design &amp; Development by<br />
                        <a href="https://www.kreaweb.be" target="_blank" tabindex="-1">kreaweb.be</a>
                    </td>
                    <td>
                        <a href="https://www.kreaweb.be" title="kreaweb.be" target="_blank" tabindex="-1">
                            <img src="{{ asset('img/logo/kreaweb-035.png') }}" alt="kreaweb.be" />
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <div class="row ">
            <div class="col small">
                <a href="https://www.yourcompany.com" target="_blank">www.yourcompany.com</a>
            </div>

            <div class="col small text-end d-none d-md-block">
                Phone : +1 730 847-416-2143<br />
                Mobile : +1 730 773-672-7009
            </div>

            <div class="col text-end">
                Your Company Name<br />4087 Johnstown Road<br />60606 Chicago</br>Illinois<br />U.S.A
            </div>
        </div>
    </div>
</div>
