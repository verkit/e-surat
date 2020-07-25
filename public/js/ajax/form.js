$(document).ready(function () {
    $(document).on('click', '#delete', function(){
        let id = [];
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $(".data-checkbox:checked").each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                $.ajax({
                    url     : baseUrl + '/md/form/',
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
            url: '/form',
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
            },
            {
                data: 'form_name',
                name: 'form_name'
            },
            {
                data: 'form_code',
                name: 'form_code'
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
