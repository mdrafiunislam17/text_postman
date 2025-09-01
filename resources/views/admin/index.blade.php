@extends("admin.layouts.master")
@section("title", "Dashboard")
@section("content")
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{ route("admin.dashboard.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-sync fa-sm text-white-50 "></i> Refresh</a>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Conveners
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($totalConvener) }}
                                    <small class="text-danger">Inactive: {{ number_format($totalConvenerInactive) }}</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Committee Members
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($totalCommitteeMember) }}
                                    <small class="text-danger">Inactive: {{ number_format($totalCommitteeMemberInactive) }}</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Advisory Councils
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ number_format($totalAdvisoryCouncil) }}
                                            <small class="text-danger">Inactive: {{ number_format($totalAdvisoryCouncilInactive) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Total Members
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ number_format($totalMember) }}
                                            <small class="text-danger">Inactive: {{ number_format($totalMemberInactive) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">T-Shirt <span
                                    class="text-muted">(Active Members)</span></h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            @php
                                $countTotalTShirts = 0;
                            @endphp

                            @foreach($tShirts as $tShirt)
                                <tr>
                                    <th>{{ $tShirt->tshirt }}</th>
                                    <td>{{ $tShirt->total }}</td>
                                </tr>

                                @php
                                    $countTotalTShirts += $tShirt->total;
                                @endphp
                            @endforeach

                            <tr class="border-top">
                                <th>Total</th>
                                <th>{{ $countTotalTShirts }}</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Number of family members <span class="text-muted">(Active Members)</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <h2>{{ number_format($totalFamilyMembers) }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Total members by district <span
                                    class="text-muted">(Active and Inactive Members)</span></h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            @php
                                $countTotalMembers = 0;
                            @endphp

                            @foreach($totalMemberByDistricts as $totalMemberByDistrict)
                                <tr>
                                    <th>{{ $totalMemberByDistrict->district }}</th>
                                    <td>{{ $totalMemberByDistrict->total }}</td>
                                </tr>
                                @php
                                    $countTotalMembers += $totalMemberByDistrict->total;
                                @endphp
                            @endforeach
                            <tr class="border-top">
                                <th>Total</th>
                                <th>{{ number_format($countTotalMembers) }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Birthday In This Month <span class="text-muted">(Active and Inactive Members)</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Member</th>
                                <th>Date of Birth</th>
                                <th>Email</th>
                                <th>District</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($birthdayInCurrentMonth) > 0)
                                @foreach($birthdayInCurrentMonth as $i => $member)
                                    <tr style="background: {{ date('d', strtotime($member->date_of_birth)) == date('d') ? '#e4ede4' : '' }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $member->id }}</td>
                                        <td>
                                            @if (file_exists(public_path("storage/uploads/$member->image")) && !empty($member->image))
                                                <img src="{{ asset("storage/uploads/$member->image") }}" width="80" alt="">
                                            @else
                                                <img src="{{ asset("member.png") }}" width="80" alt="Placeholder">
                                            @endif
                                        </td>
                                        <td>{{ $member->member_name }}</td>
                                        <td>{{ date("F d, Y", strtotime($member->date_of_birth)) }}</td>
                                        <td>{{ $member->email_address }}</td>
                                        <td>{{ $member->district }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center text-danger">Record does not exist</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
