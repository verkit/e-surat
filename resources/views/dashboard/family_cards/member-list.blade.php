<div class="col-12 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h4>Anggota Keluarga</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th style="max-width: 10px">#</th>
                        <th>Nama</th>
                        <th style="max-width: 10px">Aksi</th>
                    </tr>

                    @foreach ($members as $item)
                    <tr>
                        <td style="max-width: 10px">{{$loop->iteration}}</td>
                        <td><a href="{{route('edit.anggota.kk', $item->id)}}" target="_blank">{{$item->fullname}}</a>
                        </td>
                        <td style="max-width: 10px">
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteModal{{$item->id}}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
