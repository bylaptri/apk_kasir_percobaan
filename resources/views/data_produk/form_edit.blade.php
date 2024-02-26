@extends('template.layout')

@section('content')
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Form Edit Data Produk
								</div>
								<p class="mg-b-20">Harap untuk mengisi semua input</p>
								@include('component.pesan')
								<div class="pd-30 pd-sm-40 bg-gray-100">
                                    <form action="{{ route('produk.update',  $dt->id) }}" method="post">
                                    @csrf
                                    @method('put')
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Nama Produk</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" value="{{ $dt->nama_produk }}" placeholder="Enter your Nama Produk" name="nama_produk" type="text">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">harga</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" value="{{ $dt->harga }}" placeholder="Enter your Harga" name="harga" type="number">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Stok</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" value="{{ $dt->stok }}" placeholder="Enter your Stok" name="stok" type="number">
										</div>
									</div>
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">Save</button>
									<a href="{{ route('produk.index') }}" class="btn btn-dark pd-x-30 mg-t-5">cancel</a>
                                    </form>
								</div>
							</div>
						</div>
					</div>
                    </div>
				<!-- /row -->

@endsection
