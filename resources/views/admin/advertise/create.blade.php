<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Advertise Create</h5>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary">go back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('advertise.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 pb-3">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}">
                            @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="phone">Company Phone <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="link">Redirect Link <span class="text-danger">*</span></label>
                            <input type="tel" name="link" id="link" class="form-control" value="{{ old('link') }}">
                            @error('link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Save Record</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</x-app-layout>
