@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Daftar Transaksi Barang</strong>
                </div>
                <div class="card-body" >
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor</th>
                                <th>Total Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><a href="{{route('transactions.show',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>&nbsp;{{$item->uuid}}</a></td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->number}}</td>
                                <td>Rp.{{$item->transaction_total}}</td>
                                <td>
                                    @if($item->transaction_status == 'PENDING')
                                        <span class="badge badge-info">
                                    @elseif($item->transaction_status == 'SUCCESS')
                                        <span class="badge badge-success">
                                    @elseif($item->transaction_status == 'FAILED')
                                        <span class="badge badge-danger">
                                    @else
                                    <span>
                                    @endif
                                    {{$item->transaction_status}}        
                                    </span>
                                </td>
                                <td>
                                    @if ($item->transaction_status == 'PENDING')
                                        <a href="{{route('transactions.status',$item->id)}}?status=SUCCESS" class="btn btn-success btn-sm" > 
                                            <i class="fa fa-check"></i> 
                                        </a>
                                        <a href="{{route('transactions.status',$item->id)}}?status=FAILED" class="btn btn-warning btn-sm" > 
                                            <i class="fa fa-times"></i> 
                                        </a>
                                    @endif
                                    <a href="{{route('transactions.edit',$item->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('transactions.destroy',$item->id)}}" method="post" class="d-inline" >
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