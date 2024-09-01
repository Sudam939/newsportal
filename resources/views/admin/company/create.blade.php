<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Company Create</h5>
                <a href="{{ route('company.index') }}" class="btn btn-primary">go back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 pb-3">
                            <label for="name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="address">Company Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="pan">PAN <span class="text-danger">*</span></label>
                            <input type="number" name="pan" id="pan" class="form-control" value="{{ old('pan') }}">
                            @error('pan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="reg_no">REG NO <span class="text-danger">*</span></label>
                            <input type="number" name="reg_no" id="reg_no" class="form-control" value="{{ old('reg_no') }}">
                            @error('reg_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="facebook">Facebook </label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="youtube">Youtube </label>
                            <input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube') }}">
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="logo">Logo <span class="text-danger">*</span></label>
                            <input type="file" name="logo" id="logo" class="form-control">
                            @error('logo')
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
