<div class="mb-5 card">
    <div class="prose card-body prose-indigo">

        <div class="flex flex-wrap items-center flex-shrink-0 gap-3 md:gap-5">

            <a class="breadcrumbs-item" href="#">
                <span class="mr-4">Home</span>
            </a>

            <a class="breadcrumbs-item" href="#">
                <span class="mr-4">Course List</span>
            </a>

            <a class="breadcrumbs-item" href="#">
                <span class="mr-4">Episode</span>
            </a>

            <a class="breadcrumbs-item" href="#">
                <span class="mr-4">Tambahkan Episode</span>
            </a>

        </div>

    </div>
</div>

@section('customCSS')
<style>
    a.breadcrumbs-item {
        text-decoration: none !important;
    }

    a.breadcrumbs-item:not(:last-child)::after {
        content: "/";
    }
</style>
@endsection