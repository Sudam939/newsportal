<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Company Edit</h5>
                <a href="{{ route('company.index') }}" class="btn btn-primary">go back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('company.update',$company->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-6 pb-3">
                            <label for="name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="address">Company Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $company->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="pan">PAN <span class="text-danger">*</span></label>
                            <input type="number" name="pan" id="pan" class="form-control" value="{{ $company->pan }}">
                            @error('pan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="reg_no">REG NO <span class="text-danger">*</span></label>
                            <input type="number" name="reg_no" id="reg_no" class="form-control" value="{{ $company->reg_no }}">
                            @error('reg_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="facebook">Facebook </label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $company->facebook }}">
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="youtube">Youtube </label>
                            <input type="text" name="youtube" id="youtube" class="form-control" value="{{ $company->youtube }}">
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control pb-2">
                            <div>
                                <img src="{{asset($company->logo)}}" width="180" alt="">
                            </div>
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Update Record</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</x-app-layout>
