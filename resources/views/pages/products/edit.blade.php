@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Ubah Barang</strong>
                    <small>{{$item->name}}</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update',$item->id)}}" method="POST" >
                        @method('PUT')
                        @csrf
                        <div class="from-group">
                            <label for="name" class="form-control-label">Nama Barang</label>
                            <input type="text" 
                                   name="name" 
                                   value="{{old('name') ? old('name') : $item->name }}" 
                                   class="form-control @error('name') is-invalid @enderror" />
                            @error('neme')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="type" class="form-control-label">Type Barang</label>
                            <input type="text" 
                                   name="type" 
                                   value="{{old('type') ? old('type') : $item->type }}" 
                                   class="form-control @error('type') is-invalid @enderror" />
                            @error('type')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="description" class="form-control-label">Descripsi Barang</label>
                            <textarea name="description" 
                                      class="ckeditor form-control @error('description') is-invalid @enderror" >{{old('description') ? old('description') : $item->description }}</textarea>
                            @error('description')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="price" class="form-control-label">Harga Barang</label>
                            <input type="number" 
                                   name="price" 
                                   value="{{old('price') ? old('price') : $item->price }}" 
                                   class="form-control @error('price') is-invalid @enderror" />
                            @error('price')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="quantity" class="form-control-label">Kuantitas Barang</label>
                            <input type="number" 
                                   name="quantity" 
                                   value="{{old('quantity') ? old('quantity') : $item->quantity }}" 
                                   class="form-control @error('quantity') is-invalid @enderror" />
                            @error('quantity')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <br>
                        <div class="from-group">
                            <button class="btn btn-primary btn-block" type="submit" >Ubah Barang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection