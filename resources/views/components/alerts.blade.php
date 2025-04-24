<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyledinfo">
                    {{ session('info') }}
                </div>
            @endif
        </div>
    </div>
</div>