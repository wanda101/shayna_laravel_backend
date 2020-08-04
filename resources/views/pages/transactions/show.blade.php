@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Detail Transaksi Barang</strong>
                </div>
                <div class="card-body" >
                    <table class="table table-bordered" >
                        
                        <tr>
                            <th>No. Pesanan</th>
                            <td>{{$item->uuid}}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{$item->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$item->email}}</td>
                        </tr>
                        <tr>
                            <th>No.HP</th>
                            <td>{{$item->number}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{$item->address}}</td>
                        </tr>
                        <tr>
                            <th>Total Transaksi</th>
                            <td>{{$item->transaction_total}}</td>
                        </tr>
                        <tr>
                            <th>Status Transaksi</th>
                            <td>{{$item->transaction_status}}</td>
                        </tr>
                    
                        <tr>
                            <th>Pembelian Produk</th>
                            <td>
                                <table class="table table-bordered w-100">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Type</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                    @foreach ($item->details as $detail)
                                        <tr>
                                            <td>{{$detail->product->name}}</td>
                                            <td>{{$detail->product->type}}</td>
                                            <td>Rp.{{$detail->product->price}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Setting Status</th>
                            <td>
                                <table class="table table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>
                                                <a href="{{route('transactions.status', $item->id)}}?status=SUCCESS" class="btn btn-success btn-block">
                                                    <i class="fa fa-check">Set Sukses</i>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="{{route('transactions.status', $item->id)}}?status=FAILED" class="btn btn-warning btn-block">
                                                    <i class="fa fa-times">Set Gagal</i>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="{{route('transactions.status', $item->id)}}?status=PENDING" class="btn btn-info btn-block">
                                                    <i class="fa fa-spinner">Set Pending</i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    </table>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

