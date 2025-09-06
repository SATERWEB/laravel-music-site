<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.admin.links')

</head>
<body class="layout-boxed">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<livewire:admin.layout.header/>

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <livewire:admin.layout.sidebar/>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <div class="row layout-top-spacing">
                    {{$slot}}
                </div>

            </div>

        </div>

    </div>


</div>

@include('layouts.admin.scripts')

</body>
</html>
