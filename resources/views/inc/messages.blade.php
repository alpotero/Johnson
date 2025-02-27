@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="remark alert">
            {{ $error }}
        </div>
    @endforeach    
@endif

@if(session('success'))
    <div class="remark success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="remark alert">
        {{ session('error') }}
    </div>
@endif