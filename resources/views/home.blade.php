@extends('layouts.backend.app', ['subtitle' => 'Dashboard'])

@section('content')
    @include('layouts.partials.page-title',['title'=>'Dashboard','subtitle'=>'Dashboards'])

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-3 col-sm-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="d-flex">
                            <div class="avatar avatar-sm avatar-rounded bg-primary  me-2">
                                <i class="ti ti-currency-bitcoin fs-18"></i>
                            </div>
                            <p class="mb-0  mt-1 fw-semibold">Bitcoin</p>
                        </div>
                        <div class="ms-auto">
                            <p class="mt-1 tx-12 mb-0 text-success"><i class="ion-arrow-up-c me-1"></i>+0.25%</p>
                        </div>
                    </div>
                    <div class="d-flex mt-2 mb-1">
                        <div>
                            <p class=" mb-0">BTC / USD</p>
                            <h3 class="mb-1">$135</h3>
                        </div>
                        <div class="ms-auto text-end">
                            <p class=" mb-0">$0.04</p>
                            <p class=" mb-0 text-muted"><span class="text-muted">Vol:</span>(+2.33%)</p>
                        </div>
                    </div>
                    <div class="progress progress-xs mb-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-primary" style="width: 55%">
                        </div>
                    </div>
                    <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">70%</span></small>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="d-flex">
                            <div class="avatar avatar-sm avatar-rounded bg-danger  me-2">
                                <i class="ti ti-currency-ethereum fs-18"></i>
                            </div>
                            <p class="mb-0  mt-1 fw-semibold">Ethereum</p>
                        </div>
                        <div class="ms-auto">
                            <p class="mt-1 tx-12 mb-0 text-success"><i class="ion-arrow-up-c me-1"></i>+0.25%</p>
                        </div>
                    </div>
                    <div class="d-flex mt-2 mb-1">
                        <div>
                            <p class=" mb-0">ETH / USD</p>
                            <h3 class="mb-1">$147</h3>
                        </div>
                        <div class="ms-auto text-end">
                            <p class=" mb-0">$0.05</p>
                            <p class=" mb-0 text-muted"><span class="text-muted">Vol:</span>(+2.33%)</p>
                        </div>
                    </div>
                    <div class="progress progress-xs mb-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 50%">
                        </div>
                    </div>
                    <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">50%</span></small>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="d-flex">
                            <div class="avatar avatar-sm avatar-rounded bg-info  me-2">
                                <i class="ti ti-currency-litecoin fs-18"></i>
                            </div>
                            <p class="mb-0  mt-1 fw-semibold">Litecoin</p>
                        </div>
                        <div class="ms-auto">
                            <p class="mt-1 tx-12 mb-0 text-success"><i class="ion-arrow-up-c me-1"></i>+0.25%</p>
                        </div>
                    </div>
                    <div class="d-flex mt-2 mb-1">
                        <div>
                            <p class=" mb-0">LTC / USD</p>
                            <h3 class="mb-1">$325</h3>
                        </div>
                        <div class="ms-auto text-end">
                            <p class=" mb-0">$0.05</p>
                            <p class=" mb-0 text-muted"><span class="text-muted">Vol:</span>(+0.32%)</p>
                        </div>
                    </div>
                    <div class="progress progress-xs mb-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-info" style="width: 60%">
                        </div>
                    </div>
                    <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">60%</span></small>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="d-flex">
                            <div class="avatar avatar-sm avatar-rounded bg-secondary  me-2">
                                <i class="ti ti-currency-ripple fs-18"></i>
                            </div>
                            <p class="mb-0  mt-1 fw-semibold">Ripple</p>
                        </div>
                        <div class="ms-auto">
                            <p class="mt-1 tx-12 mb-0 text-success"><i class="ion-arrow-up-c me-1"></i>+0.25%</p>
                        </div>
                    </div>
                    <div class="d-flex mt-2 mb-1">
                        <div>
                            <p class=" mb-0">XRP / USD</p>
                            <h3 class="mb-1">$225</h3>
                        </div>
                        <div class="ms-auto text-end">
                            <p class=" mb-0">$0.05</p>
                            <p class=" mb-0 text-muted"><span class="text-muted">Vol:</span>(+0.52%)</p>
                        </div>
                    </div>
                    <div class="progress progress-xs mb-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-secondary" style="width: 68%">
                        </div>
                    </div>
                    <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">68%</span></small>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
@endsection

@push('scripts')

@endpush
