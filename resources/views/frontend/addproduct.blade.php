@extends('layouts-frontend.master')

@section('content')
    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Add Product</h2>
                        <p>Add new products to the site so that shoppers can benefit from our store.</p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" action="{{ route('storeproduct') }}" id="fruitkha-contact"
                            enctype="multipart/form-data">
                            @csrf
                            <p>
                                <input type="text" placeholder="Product Name" name="name" id="name" required
                                    value="{{ old('name') }}">
                                {{-- message show errors --}}
                                <span>
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="number" placeholder="Price" name="price" id="price" required
                                    value="{{ old('price') }}">
                                <span>
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="description" required
                                    value="{{ old('description') }}"></textarea>
                                <span>
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>


                            <select name="category_id" id="mySelect" class="form-select w-50">
                                <option required value="">Selected Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <input type="file" id="image" name="image" accept="image/*" required>
                            @error('image')
                                {{ $message }}
                            @enderror
                            <p><input type="submit" value="Add" style="margin-top: 20px;"></p>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i> Shop Address</h4>
                            <p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="far fa-clock"></i> Shop Hours</h4>
                            <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i> Contact</h4>
                            <p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->
@endsection
