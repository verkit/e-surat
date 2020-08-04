@extends('layouts.client-master')
@section('content')
<!-- Register Area-->
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h4>{{$data->letter->letter_name}}</h4>
                    <p>{{$data->created_at->isoFormat('d MMMM Y')}}</p>
                    <button type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal"
                        data-target="#deleteModal">
                        Hapus Permohonan
                    </button>
                     <!-- Modal -->
                     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title">Yakin menghapus permohonan {{$data->letter->letter_name}}?</h6>
                                    <div class="flex d-flex mt-3 justify-content-center">
                                        <button type="button" class="btn btn-sm btn-primary mr-1"
                                            data-dismiss="modal">Tidak</button>
                                        <form action="{{route('hapus.permohonan-surat', $data->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Iya</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
                @endif
                <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
                    <div class="card-body">
                        <!-- Register Form-->
                        <div class="my-3">
                            @foreach ($data->letter->forms as $key => $item)
                            @if ($item->is_displayed == 0)
                            <div class="form-group mb-3">
                                <label class="mb-2">{{$item->form_name}}</label>
                                <input readonly @if ($item->is_date == 1)
                                type="date"
                                @else
                                type="text"
                                @endif
                                class="form-control @error('form_name[]') is-invalid
                                @enderror" required name="form_name[]" value="{{$forms[$key]->text}}">
                                <input type="text" class="form-control" name="form_id[]" value="{{$forms[$key]->id}}"
                                    hidden readonly>
                                @error('form_name[]')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @else
                                <input type="text" name="form_name[]" value="" readonly hidden>
                                <input type="text" name="form_id[]" value="{{$item->id}}" readonly hidden>
                                @endif
                                @enderror
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
