@extends('template.layout')

@section('content')

<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
                            <h4 class="card-title mg-b-2 mt-2">Data Pelanggan</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
                            <div class="d-flex my-auto btn-list justify-content-end">
									<a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Data</a>

								</div>
							</div>
                            @include('component.pesan')
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pelanggan</th>
												<th>Alamat</th>
												<th>Nomor Telepon</th>
												<th>Action</th>
											</tr>
										</thead>
                                        <tbody>
                                        @foreach ($pelanggan as $dt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dt->nama_pelanggan }}</td>
                                                <td>{{ $dt->alamat }}</td>
                                                <td>{{ $dt->nomor_telepon }}</td>
                                                <td>
                                                    <a href="{{ route('pelanggan.edit',$dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
													<form onsubmit="return confirm('apakah anda yakin hapus data ini?')"action="{{ route('pelanggan.destroy',$dt->id) }}" method="post" class="d-inline">
														@csrf @method('DELETE')
													<button type="submit" class="btn btn-sm btn-danger">Delete</button>
													</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
@endsection
