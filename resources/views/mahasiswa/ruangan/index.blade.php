@extends('templateAdminLTE/home')
@section('sub-breadcrumb', $title)
@section('content')
    <div class="row bg-white">
        <div class="col-md-6 col-md-offset-3">
            {{-- <div class="box p-5"> --}}
            {{-- <div class="panel"> --}}
            <h1 class="text-center m-b-0">Cari Ruangan</h1>
            <p class="text-center">Pilih Tanggal Pemesanan</p>
            <form action="#" method="post">
                <div class="input-group m-b-2">
                    <input type="text" class="form-control" id="tgl_pinjam" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

            <div class="panel panel-black">

                <div class="panel-heading">
                    <span class="panel-title">Silahkan Pilih Ruangan : <strong>{{ auth()->user()->name }}</strong></span>
                    <div class="panel-heading-controls">
                        <ul class="pager pager-xs">
                            <li><a href="{{ route('mahasiswa.ruangan.index') }}" class=" bg-primary">Riwayat Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    @foreach ($gedungs as $gedung)
                    <div class="panel row">
                        <div class="">
                            @if ($gedung->foto)
                                <div class="widget-products-item col-xs-12 col-sm-6 col-md-4 col-xl-3 m-b-0 p-l-0">
                                    <a href="#" class="widget-products-image">
                                        <img src="{{ asset('storage/gedungs/' . $gedung->foto) }}">
                                        <span class="widget-products-overlay"></span>
                                    </a>
                                </div>
                                {{-- <img src="{{ asset('storage/ruangans/' . $gedung->foto_ruangan) }}" alt=""
                                    class="rounded col-md-4" style="max-width: 250px"> --}}
                            @else
                                <div class="widget-products-item col-xs-12 col-sm-6 col-md-4 col-xl-3 m-b-0 p-l-0">
                                    <a href="#" class="widget-products-image">
                                        <img
                                            src="https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg">
                                        <span class="widget-products-overlay"></span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="widget-notifications-item">
                                <div class="widget-notifications-title text-primary font-size-18">
                                    {{ $gedung->nama }}
                                </div>
                                {{-- <div class="widget-notifications-description">
                                    <i class="fa fa-location-dot"></i> {{ $gedung->gedung->nama }} - Lantai
                                    {{ $gedung->lantai }}
                                </div>
                                <div class="widget-notifications-description m-t-1"><strong>Kapasitas</strong>:
                                    {{ $gedung->kapasitas }} Orang</div>
                                <div class="widget-notifications-description"><strong>Luas</strong>:
                                    {{ $gedung->luas }} Meter&sup2;</div> --}}
                                <div class="widget-notifications-description"><strong>Lokasi</strong>:
                                    {{ $gedung->lokasi }}</div>
                                <div class="widget-notifications-description"><strong>Jumlah Lantai</strong>:
                                    {{ $gedung->jumlah_lantai }} Lantai</div>
                                <a href="{{ route('ruangan.byGedung', encrypt($gedung->id)) }}"
                                    class="btn btn-primary btn-sm m-t-1">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                


                
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    <div class="row bg-white">
        <div id="list-ruangan"></div>
        <div class="col-md-8 col-md-offset-2">


        </div>
        <div class="col-md-12">
            <div class="text-center">
                {{ $gedungs->links() }}

            </div>
        </div>

    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $("#tgl_pinjam").daterangepicker();
        });
    </script>
    <script>
        $(document).ready(function() {
            list_ruangan()
        });


        function list_ruangan() {
            var url = '{{ route('ruangan.get') }}';
            $.ajax({
                    method: "GET",
                    url: url,
                })
                .done(function(data) {
                    // $('#list-ruangan').html(data.html);
                })
        }
    </script>
@endpush
