<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Post Edit</h5>
                <a href="{{ route('post.index') }}" class="btn btn-primary">go back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">

                        <div class="col-md-6 pb-3">
                            <label for="categories">Select Categories <span class="text-danger">*</span></label>
                            <select name="categories[]" id="categories" class="form-control select2" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @foreach ($post->categories as $cat)
                                        {{ $cat->id == $category->id ? 'selected' : '' }} @endforeach>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6 pb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 pb-3">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote">
                                {{ $post->description }}
                            </textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 pb-3">
                            <label for="meta_keywords">Meta KeyWords</label>
                            <textarea name="meta_keywords" id="meta_keywords" cols="30" rows="10" class="form-control">
                                {{ $post->meta_keywords }}
                            </textarea>
                            @error('meta_keywords')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 pb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control">
                                {{ $post->meta_description }}
                            </textarea>
                            @error('meta_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="status">Change Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $post->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $post->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-3">
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control pb-3">
                            <img src="{{ asset($post->image) }}" width="120" alt="">
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
