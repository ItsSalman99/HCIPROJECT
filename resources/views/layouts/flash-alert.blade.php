<div style="margin-left: 5%; max-width: 90%;">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">

            <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">

            <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">

        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">

        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         Please check the form below for errors
    </div>
    @endif
</div>
