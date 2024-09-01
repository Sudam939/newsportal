<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Category Edit</h5>
                <a href="{{ route('category.index') }}" class="btn btn-primary">go back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-6 pb-3">
                            <label for="title">Category Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="nep_title">Category Nepali Title <span class="text-danger">*</span></label>
                            <input type="text" name="nep_title" id="nep_title" class="form-control" value="{{ $category->nep_title }}">
                            @error('nep_title')
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
