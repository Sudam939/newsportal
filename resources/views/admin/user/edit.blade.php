<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Advertise Edit</h5>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary">go back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('advertise.update', $advertise->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 pb-3">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name" class="form-control"
                                value="{{ $advertise->company_name }}">
                            @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="phone">Company Phone <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                value="{{ $advertise->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="link">Redirect Link <span class="text-danger">*</span></label>
                            <input type="tel" name="link" id="link" class="form-control"
                                value="{{ $advertise->link }}">
                            @error('link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="status">Change Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $advertise->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $advertise->status == 0 ? 'selected' : '' }}>InActive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control pb-3">
                            <div>
                                <img src="{{ asset($advertise->image) }}" width="180" alt="">
                            </div>
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
