@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Daftar Foto Barang</strong>
                    <small>"{{$product->name}}"</small>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Foto</th>
                                <th>Default</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>
                                    <img src="{{ url($item->photo) }}" width="100px" height="100px" alt="" />
                                </td>
                                <td>{{$item->is_default ? 'Ya' : 'Tidak' }}</td>
                                <td>
                                    {{-- <a href="{{route('product.gallery')}}" class="btn btn-info btn-sm"> --}}
                                    {{-- <a href="#" class="btn btn-info btn-sm">
                                        <i class="fa fa-picture-o"></i>
                                    </a> --}}
                                    {{-- <a href="{{route('products.edit',$item->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a> --}}
                                    <form action="{{route('product-galleries.destroy',$item->id)}}" method="post" class="d-inline" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center" >
                                        Data tidak ada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection