<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Post</h5>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Add New</a>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $index => $post)
                                <tr>
                                    <td>
                                        {{ ++$index }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($post->image) }}" width="80" alt="">
                                    </td>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        {{ $post->categories->pluck("title")->implode(", ") }}
                                    </td>
                                    <td>
                                        {{ $post->views }}
                                    </td>
                                    <td>
                                        @if ($post->status == 'pending')
                                            <span class="badge bg-warning text-white">Pending</span>
                                        @elseif ($post->status == 'approved')
                                            <span class="badge bg-success text-white">Approved</span>
                                        @else
                                            <span class="badge bg-danger text-white">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                            data-confirm-delete="true">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
