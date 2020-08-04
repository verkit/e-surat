$(document).ready(function () {
    $(document).on('click', '#delete', function () {
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url: baseUrl + '/md/permohonan-surat/',
                    method: 'delete',
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function (data) {
                        alert('Berhasil menghapus data');
                        $("#table").DataTable().ajax.reload();
                        $("#checkbox-all").prop('checked', false);
                    }
                });
            } else {
                alert('Harap pilih data');
            }
        }
    });

    $(document).on('click', '#delete_success_table', function () {
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url: baseUrl + '/md/permohonan-surat/',
                    method: 'delete',
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function (data) {
                        alert('Berhasil menghapus data');
                        $("#success_table").DataTable().ajax.reload();
                        $("#checkbox-all").prop('checked', false);
                    }
                });
            } else {
                alert('Harap pilih data');
            }
        }
    });

    $("#checkbox-all").click(function () {
        if (this.checked) {
            $(".data-checkbox").prop('checked', true);
        } else {
            $(".data-checkbox").prop('checked', false);
        }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/permohonan-surat',
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
            },
            {
                data: 'account',
                name: 'account'
            },
            {
                data: 'letter_name',
                name: 'letter_name'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });

    $('#success_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/permohonan-surat/sukses',
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'letter_name',
                name: 'letter_name'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });
});
