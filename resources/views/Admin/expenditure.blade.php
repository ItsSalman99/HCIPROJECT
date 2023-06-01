@extends('layouts.admin')
@section('content')

    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Expenditure</h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            @if (Auth::user()->user_type == 1)
                <form action="{{ route('admin.expense.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <div class="position-relative">
                                        <div class="d-flex">
                                            <select id="roamers" class="select-box" name="roamers">
                                                <option value="0">Roamer wise</option>
                                                @foreach ($roamers as $roamer)
                                                    <option value="{{ $roamer->id }}" <?php if ($roamerID == $roamer->id) {
                                                        echo 'selected';
                                                    } ?>>
                                                        {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
            <br>
            <br>
            <br>
            <div class=" padding-inline-2vw">
                @if ($transaction != null)
                    <div
                        class="Expenditure-image-area border-bottom d-flex align-items-center flex-wrap justify-content-between pb-4 mb-4 gap-4">
                        <div class="d-flex align-items-center flex-wrap gap-4">
                            <img src="{{ asset('assets/admin/images/user.jpg') }}" alt="image">
                            <div>
                                <p>#123458</p>
                                <h5 class=" primary-text font-weight-700">
                                    {{ isset($user) ? $user->first_name . ' ' . $user->last_name : Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                </h5>
                                <p class="d-inline-block opacity-07">Total Expenditure </p> <span
                                    class=" font-weight-700 opacity-06">{{ calculateTotalExpense($transaction) }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 ms-auto flex-wrap justify-content-center">
                            <div class="btn-group expenditure-btn">
                                <button type="button">Expended <i class="bi bi-chevron-down"></i></button>
                                <button type="button" class="dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-radius-5px">
                                    <div>
                                        <form method="POST" action="{{ route('admin.addExpense') }}">
                                            @csrf
                                            <p class="mb-2 opacity-06 text-capitalize">Add amount Expenditure</p>
                                            <div class="form-group">
                                                @if (Auth::user()->user_type == 1)
                                                    <input name="roamer_id" value="{{ $user->id }}" hidden>
                                                    <input class="form-control" value="{{ $user->getName() }}" readonly>
                                                @else
                                                    <input type="hidden" name="roamer_id" value="{{ Auth::user()->id }}">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="order_id">
                                                    <option value="">Select Order No</option>
                                                    @foreach ($orders as $order)
                                                        <option value="{{ $order->id }}">
                                                            {{ $order->id }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input name="reason" type="text" class=" form-control"
                                                    placeholder="Reason">
                                            </div>

                                            <div class="form-group mb-0">
                                                <input name="debit" type="number" class=" form-control"
                                                    placeholder="(Expenditure) Amount">
                                            </div>
                                            <br>
                                            <ul class=" d-flex align-items-center justify-content-end gap-3">
                                                <li><a href="#" class=" default-black opacity-04 font-12px">Cancel</a>
                                                </li>
                                                <li><button style="background: var(--primary-clr);" type="submit"
                                                        id="expenseBtn"
                                                        class="btn btn-primary extra-btn-padding-30 py-2 font-12px">Add
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </ul>
                            </div>
                            <!-- <i class="material-icons opacity-04">
                                                                                            more_vert
                                                                                        </i> -->
                            <div class="btn-group topup-btn">
                                <button type="button">Topped Up <i class="bi bi-chevron-down"></i></button>
                                <button type="button" class="dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-radius-5px">
                                    <div>
                                        <form method="POST" action="{{ route('admin.addToppped') }}">
                                            @csrf
                                            <p class="mb-2 opacity-06 text-capitalize">Add amount Expenditure</p>
                                            <div class="form-group">
                                                <input type="hidden" name="roamer_id" value="{{ $roamerID }}">
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="order_id">
                                                    <option value="">Select Order No</option>
                                                    @foreach ($orders as $order)
                                                        <option value="{{ $order->id }}">
                                                            {{ $order->id }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input name="reason" type="text" class=" form-control"
                                                    placeholder="Reason">
                                            </div>

                                            <div class="form-group mb-0">
                                                <input name="credit" type="number" class=" form-control"
                                                    placeholder="(Expenditure) Amount">
                                            </div>
                                            <br>
                                            <ul class=" d-flex align-items-center justify-content-end gap-3">
                                                <li><a href="#"
                                                        class=" default-black opacity-04 font-12px">Cancel</a>
                                                </li>
                                                <li><button style="background: var(--primary-clr);" type="submit"
                                                        id="expenseBtn"
                                                        class="btn btn-primary extra-btn-padding-30 py-2 font-12px">Add
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="datatable-v1 style-pagination">
                    <table class="myDataTable display" data-ordering="false" style="width:100%">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Expended</th>
                                <th>Topped Up</th>
                            </tr>
                        </thead>

                        @if ($transaction != null)
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($transaction as $key => $transactions)
                                    @php
                                        $total += $transactions->credit - $transactions->debit;
                                    @endphp
                                    <tr>
                                        <td class=" opacity-07 font-weight-500">#{{ $key + 1 }}</td>
                                        <td class=" opacity-07 font-weight-500">{{ $transactions->reason ?? 'Product' }}
                                        </td>
                                        <td class=" opacity-07 font-weight-400">
                                            {{ $transactions->created_at->format('d M Y') }}</td>
                                        <td>
                                            <p class=" opacity-07 font-weight-500 d-inline-block">
                                                {{ number_format($transactions->debit) }}</p>
                                            {{-- <p class="font-weight-400 d-inline-block opacity-07">(Expenditure)</p> --}}
                                        </td>
                                        <td class=" opacity-07">{{ number_format($transactions->credit) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class=" opacity-07 font-weight-500"></td>
                                    <td class=" opacity-07 font-weight-500"></td>
                                    <td class=" opacity-07 font-weight-500"></td>
                                    <td class=" opacity-07 font-weight-500">Total</td>
                                    <td class=" opacity-07 font-weight-500"><b>{{ number_format($total) }}</b></td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
