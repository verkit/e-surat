$(document).ready(function () {
    $(document).on('click', '#delete', function(){
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url     : baseUrl + '/md/perangkat-desa/',
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
            url: '/perangkat-desa',
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
                data: 'position',
                name: 'position'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
            }
        ],
    });
});
