@extends("themes.admin.master")

@section("title")
New Ships
@endsection

@section("content")
<x-layout heading="New Ship">
    <form action="{{ route('admin.page.page.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('admin.page.page.index') }}">
                            <x-arrow-left>Go Back</x-arrow-left>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <x-flash></x-flash>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">
                                        Title
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('page_name') }}" name="page_name" id="page_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Page Description
                                    </label>
                                    <textarea class="form-control" name="page_description" id="page_description">{{ old('page_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">
                                        Page Type
                                    </label>
                                    <select name="page_type" id="page_type" class="form-control">
                                        <option value="terms" @if(old('page_type')=='terms' ) selected @endif>Terms & Condition</option>
                                        <option value="standard" @if(old('page_type')=='standard' ) selected @endif>Standard</option>
                                        <option value="gallery" @if(old('page_type')=='gallery' ) selected @endif>Gallery</option>
                                        <option value="about-us" @if(old('page_type')=='about-us' ) selected @endif>About Us</option>
                                        <option value="contact-us" @if(old('page_type')=='contact-us' ) selected @endif>Contact Us</option>
                                        <option value="team" @if(old('page_type')=='team' ) selected @endif>Team</option>
                                        <option value="project-single" @if(old('page_type')=='project-single' ) selected @endif>Project Single</option>
                                        <option value="course" @if(old('page_type')=='courses' ) selected @endif>Course</option>
                                        <option value="video" @if(old('page_type')=='video' ) selected @endif>Video</option>
                                        <option value="home" @if(old('page_type')=='home' ) selected @endif>Home</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Display Option
                                    </label>
                                    <select name="display_option" id="display_option" class="form-control">
                                        <option value="public" @if(old('display_option')=='public' ) selected @endif>Public</option>
                                        <option value="admin" @if(old('display_option')=='admin' ) selected @endif>Admin</option>
                                        <option value="parent" @if(old('display_option')=='parent' ) selected @endif>Parent</option>
                                        <option value="auth" @if(old('display_option')=='auth' ) selected @endif>Autheticated</option>
                                        <option value="student" @if(old('display_option')=='student' ) selected @endif>Student</option>
                                        <option value="org" @if(old('display_option')=='org' ) selected @endif>Organisation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Featured Image
                                    </label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Banner Image
                                    </label>
                                    <input type="file" name="banner_image" id="featured_image" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Create Page
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection