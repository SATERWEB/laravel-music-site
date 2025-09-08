<div class="col-md-3">

    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت سایدبار</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <form wire:submit.prevent="submit">


            <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="category" class="form-label">دسته بندی والد</label>
                        <select id="category" class="form-control" name="category" wire:model="category" autocomplete="off" wire:ignore>
                            <option value="">انتخاب کنید</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                @error('category')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert" wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="title" class="form-label">پیش نوشته</label>
                        <input type="text" class="form-control" id="title" wire:model="title" name="title"
                               placeholder="دانلود آهنگ">
                    </div>
                </div>

                @error('title')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert"
                     wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="artist" class="form-label">نام هنرمند</label>
                        <input type="text" class="form-control" id="artist" wire:model="artist" name="artist"
                               placeholder="">
                    </div>
                </div>

                @error('artist')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert"
                     wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="name" class="form-label">نام آهنگ</label>
                        <input type="text" class="form-control" id="name" wire:model="name" name="name"
                               placeholder="">
                    </div>
                </div>

                @error('name')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert"
                     wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="link" class="form-label">آپلود آهنگ</label>
                        <input type="file" class="form-control" id="link" wire:model="link" name="link"
                               placeholder="">

                    </div>
                </div>

                @error('link')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert"
                     wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="image" class="form-label">آپلود تصویر</label>
                        <input type="file" class="form-control" id="image" wire:model="image" name="image"
                               placeholder="">

                    </div>
                </div>

                @error('image')
                <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert"
                     wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong></strong> {{$message}}.</button>
                </div>
                @enderror



                <button type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                    <span  wire:loading.remove> ثبت</span>
                    <div class="spinner-border text-white me-2 align-self-center loader-sm " wire:loading></div>
                </button>
            </form>

        </div>
    </div>
</div>
