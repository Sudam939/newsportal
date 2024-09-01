<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Company</h5>
                <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>Category Title</th>
                                <th>Category Nepali Title</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td>
                                        {{ ++$index }}
                                    </td>
                                    <td>
                                        {{ $category->title }}
                                    </td>
                                    <td>
                                        {{ $category->nep_title }}
                                    </td>
                                    <td>
                                        {{ $category->slug }}
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('category.destroy', $category->id) }}"
                                            class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
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
