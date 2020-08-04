@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Tambah Foto Barang</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('product-galleries.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="from-group">
                            <label for="products_id" class="form-control-label">Nama Barang</label>
                                <select data-placeholder="Pilih Barang..." class="standardSelect" tabindex="1" name="products_id" @error('products_id') is-invalid @enderror>
                                    <option value="" label="default"></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>   
                            @error('products_id')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="photo" class="form-control-label">Foto Barang</label>
                            <input type="file" 
                                   name="photo" 
                                   value="{{old('photo')}}" 
                                   accept="image/*" 
                                   {{-- accept="image/*" hanya foto yg bisa di upload --}}
                                   class="form-control @error('photo') is-invalid @enderror" />
                            @error('photo')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="is_default" class="form-control-label">Jadikan Default</label>
                            <br>
                            <label>
                                <input type="radio" 
                                   name="is_default" 
                                   value="1" 
                                   class="form-control @error('is_default') is-invalid @enderror" /> Yes
                            </label>
                            &nbsp;
                            <label>
                                <input type="radio" 
                                   name="is_default" 
                                   value="0" 
                                   class="form-control @error('is_default') is-invalid @enderror" /> No
                            </label>
                            @error('is_default')
                                <div class="text-muted">{{$message}}</div>    
                            @enderror
                        </div>
                        <br>
                        <div class="from-group">
                            <button class="btn btn-primary btn-block" type="submit" >Tambah Foto Barang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection