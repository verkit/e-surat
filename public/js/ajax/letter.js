$(document).ready(function () {
    $(document).on('click', '#delete', function(){
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url     : baseUrl + '/md/surat/',
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
            $(".user-checkbox").prop('checked',true);
        } else {
            $(".user-checkbox").prop('checked',false);
        }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/surat',
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
            },
            {
                data: 'letter_name',
                name: 'letter_name'
            },
            {
                data: 'is_displayed',
                name: 'is_displayed'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });
});
