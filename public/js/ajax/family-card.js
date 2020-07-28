$(document).ready(function () {
    $(document).on('click', '#delete', function(){
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url     : baseUrl + '/md/blangko-kk',
                    method  : 'delete',
                    data    : {
                        _token  : _token,
                        id      : id,
                    },
                    success : function(data){
                        alert('Berhasil menghapus data');
                        $("#table").DataTable().ajax.reload();
                        $("#checkbox-all").prop('checked',false);
                    }
                });
            } else {
                alert('Harap pilih data');
            }
        }
    });

    $("#checkbox-all").click(function(){
        if (this.checked) {
            $(".data-checkbox").prop('checked',true);
        } else {
            $(".data-checkbox").prop('checked',false);
        }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/blangko-kk',
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
                data: 'date',
                name: 'date'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });

    $('#table_new').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/blangko-kk-baru',
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
                data: 'date',
                name: 'date'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });

    $('#table_separate').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/blangko-kk-pisah',
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
