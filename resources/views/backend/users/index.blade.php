@extends('layouts.backend')

@section('title')
    &vert; Users
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Users</div>

                <div class="col fs-5 text-end">
                    <img src="{{ asset('img/icons/persons.png') }}" />
                </div>
            </div>
        </div>

        <div class="card-body p-1">
            <div class="d-flex justify-content-between mb-1">
                <div id="ToolbarLeft"></div>
                <div id="ToolbarCenter"></div>
                <div id="ToolbarRight"></div>
            </div>

            <table id="sqltable" class="table table-bordered table-striped table-hover table-sm dataTable">
                <thead class="table-success">
                    <tr>
                        <th scope="col" width="4%">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" class="text-danger">Developer ?</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend.components.datatables-js')

    @parent
    <script>
        $(function() {
            /* ------------------------------------------------------------------------ */
            let createButton = {
                className: 'btn-success',
                text: '<i class="bi bi-plus"></i>',
                titleAttr: 'Add',
                enabled: true,
                action: function(e, dt, node, config) {
                    var url = '{{ route('backend.users.create') }}';

                    document.location.href = url;
                }
            }
            dtButtonsCenter.push(createButton)

            let editButton = {
                extend: 'selectedSingle',
                className: 'btn-primary selectOne',
                text: '<i class="bi bi-pencil"></i>',
                titleAttr: 'Edit',
                enabled: false,
                action: function(e, dt, node, config) {
                    var id = dt.row({
                        selected: true
                    }).data().id;

                    var url = '{{ route('backend.users.edit', 'id') }}';
                    url = url.replace("id", id);

                    document.location.href = url;
                }
            }
            dtButtonsCenter.push(editButton)

            let clearButton = {
                className: 'btn-secondary',
                text: '<i class="bi bi-arrow-counterclockwise"></i>',
                titleAttr: 'Reset filter and sort',
                action: function(e, dt, node, config) {
                    dt.state.clear();
                    window.location.reload();
                }
            }
            dtButtonsRight.push(clearButton)

            let deleteButton = {
                extend: 'selected',
                className: 'btn-danger selectMultiple',
                text: '<i class="bi bi-trash"></i>',
                titleAttr: 'Delete',
                enabled: false,
                url: "{{ route('backend.users.massDestroy') }}",
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).data(), function(entry) {
                        return entry.id;
                    });

                    if (ids.length === 0) {
                        bootbox.alert({
                            title: 'Error ...',
                            message: 'Nothing selected'
                        });
                        return
                    }

                    bootbox.confirm({
                        title: 'Delete item(s) ...',
                        message: "Are you sure?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-sm btn-primary'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-sm btn-secondary'
                            }
                        },
                        callback: function(confirmed) {
                            if (confirmed) {
                                $.ajax({
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    },
                                    success: function(response) {
                                        oTable.draw();

                                        showToast({
                                            type: 'success',
                                            title: 'Delete ...',
                                            message: 'The selection has been deleted.',
                                        });
                                    }
                                });
                            }
                        }
                    });
                }
            }
            dtButtonsRight.push(deleteButton)
            /* ------------------------------------------------------------------------ */
            let dtOverrideGlobals = {
                serverSide: true,
                retrieve: true,
                ajax: {
                    url: "{{ route('backend.users.index') }}",
                    data: function(d) {}
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-end'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                        sortable: false,
                        render: function(data, type, row, meta) {
                            if (data) {
                                return '<a a href="mailto:' + data +
                                    '?SUBJECT=Houtenplaten.be - GEBRUIKER">' +
                                    data + '</a>';
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'is_developer',
                        name: 'is_developer',
                        searchable: false,
                        className: "text-center no-select toggleIsDeveloper",
                        render: function(data, type, row, meta) {
                            if (data == 1) {
                                return '<i class="bi bi-check-lg"></i>';
                            } else {
                                return '&nbsp;';
                            }
                        },
                    },
                ],
                select: {
                    selector: 'td:not(.no-select)',
                },
                ordering: true,
                order: [
                    [1, 'asc']
                ],
                preDrawCallback: function(settings) {
                    oTable.columns.adjust();
                }
            };
            /* ------------------------------------------- */
            let oTable = $('#sqltable').DataTable(dtOverrideGlobals);
            /* ------------------------------------------------------------------------ */
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupLeft',
                buttons: dtButtonsLeft
            });
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupCenter',
                buttons: dtButtonsCenter
            });
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupRight',
                buttons: dtButtonsRight
            });

            oTable.buttons('BtnGroupLeft', null).containers().appendTo('#ToolbarLeft');
            oTable.buttons('BtnGroupCenter', null).containers().appendTo('#ToolbarCenter');
            oTable.buttons('BtnGroupRight', null).containers().appendTo('#ToolbarRight');
            /* ------------------------------------------------------------------------ */
            oTable.on('select deselect', function(e, dt, type, indexes) {
                var selectedRows = oTable.rows({
                    selected: true
                }).count();

                oTable.buttons('.selectOne').enable(selectedRows === 1);
                oTable.buttons('.selectMultiple').enable(selectedRows > 0);
            });
            /* ------------------------------------------------------------------------ */
            /* DATATABLE - CELL - Action					   						    */
            /* ------------------------------------------------------------------------ */
            $('#sqltable tbody').on('click', 'td.toggleIsDeveloper', function() {
                var table = 'users';
                var id = oTable.row($(this).closest("tr")).data().DT_RowId;
                var key = 'is_developer';
                var value = oTable.cell(this).data();

                if (id == 1) {
                    bootbox.dialog({
                        title: "Edit ...",
                        message: "This record is read-only.",
                        onEscape: true,
                        backdrop: true,
                    });
                } else {
                    bootbox.confirm({
                        title: 'Edit ...',
                        message: MyItem(id, key, value),
                        size: 'xl',
                        onEscape: true,
                        backdrop: true,
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-secondary'
                            }
                        },
                        callback: function(confirmed) {
                            if (confirmed) {
                                value = value == 0 ? 1 : 0;

                                setValue(table, id, key, value);
                            }
                        }
                    });
                }
            });
            /* ------------------------------------------------------------------------ */
            /* FUNCTIONS - MyItem, setValue                     					    */
            /* ------------------------------------------------------------------------ */
            function MyItem(id, key, value) {
                var aRow = oTable.row('#' + id).data();

                if (value == 1) {
                    from = '1';
                    to = '0';
                } else {
                    from = '0';
                    to = '1';
                }

                var strHTML = '';
                strHTML += '<table class="table table-bordered table-sm mytable">';
                strHTML += '<thead>';
                strHTML +=
                    '<tr><th>ID</th><th>Name</th><th>E-mail</th><th>Developer ?</th></tr>';
                strHTML += '</thead>';
                strHTML += '<tbody>';
                strHTML += '<tr>';
                strHTML += '<td class="text-end">' + aRow['id'] + '</td>';
                strHTML += '<td>';
                if (aRow['name'] == null) {
                    strHTML += '&nbsp;';
                } else {
                    strHTML += aRow['name'];
                }
                strHTML += '</td>';
                strHTML += '<td>';
                if (aRow['email'] == null) {
                    strHTML += '&nbsp;';
                } else {
                    strHTML += aRow['email'];
                }
                strHTML += '</td>';
                strHTML += '<td class="text-center">';
                strHTML += from + ' <i class="bi bi-arrow-right"></i> ' + to;
                strHTML += '</td>';
                strHTML += '</tr>';
                strHTML += '</tbody>';
                strHTML += '</table>';
                strHTML += '<div>Are you sure you want to edit the item(s) above?</div>';
                return strHTML;
            };
            /* ------------------------------------------- */
            function setValue(table, id, key, value) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.general.setValueDB') }}",
                    data: {
                        table: table,
                        id: id,
                        key: key,
                        value: value,
                    },
                    success: function(response) {
                        oTable.rows(id).invalidate().draw(false);

                        showToast(response);
                    }
                });
            };
            /* ------------------------------------------------------------------------ */
        });
    </script>
@endsection

@section('styles')
    @include('backend.components.datatables-css')
@endsection
