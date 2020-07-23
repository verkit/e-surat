$(document).ready(function () {
    $(document).on('click', '#delete', function(){
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".user-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url     : baseUrl + '/md/akun/',
                    method  : 'delete',
                    data    : {
                        _token  : _token,
                        id      : id,
                    },
                    success : function(data){
                        alert('Berhasil menghapus data');
                        $("#table").DataTable().ajax.reload();
                        $("#check-all").prop('checked',false);
                    }
                });
            } else {
                alert('Harap pilih user');
            }
        }
    });

    $("#checkbox-all").click(function(){
        if (this.checked) {
            $(".user-checkbox").prop('checked',true);
        } else {
            $(".user-checkbox").prop('checked',false);
        }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/akun',
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
                data: 'email',
                name: 'email'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });
});
