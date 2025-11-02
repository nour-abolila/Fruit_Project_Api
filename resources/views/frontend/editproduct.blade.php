@extends('layouts-frontend.master')

@section('content')
    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Edit Product</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est,
                            assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse
                            natus!</p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" action="{{ route('updateproduct', $product->id) }}" id="fruitkha-contact"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>
                                <input type="text" placeholder="Name" name="name" id="name" required
                                    value="{{ $product->name }}">
                                {{-- message show errors --}}
                                <span>
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="number" placeholder="price" name="price" id="price" required
                                    value="{{ $product->price }}">
                                <span>
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </p>
                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="description" required>{{ $product->description }}</textarea>
                                <span>
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>

                            {{-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> --}}

                            <select name="category_id" id="mySelect" class="form-select w-50" required>

                                @foreach ($categories as $item)
                                    @if ($item->id == $product->category_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="image">تحديث الصورة:</label>
                            <input type="file" id="image" name="image" accept="image/*">
                            <img src="{{ asset($product->image) }}" width="200" height="200">


                            <p><input type="submit" value="Edit"></p>

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
