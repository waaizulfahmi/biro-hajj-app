<div class="container">
    {{-- Form untuk mengganti identitas --}}
    <div class="row">
        <div class="col-md-5">
            {{-- name, location, rating, description, image --}}
            <div class="form-group">
                <label for="name">Name Agent</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $hajj->name ?? '') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="airline">Airline</label>
                <input type="text" name="airline" id="airline"
                    class="form-control @error('airline') is-invalid @enderror"
                    value="{{ old('airline', $hajj->airline ?? '') }}">
                @error('airline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category"
                    class="form-control @error('category') is-invalid @enderror"
                    value="{{ old('category', $hajj->category ?? '') }}">
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location"
                    class="form-control @error('location') is-invalid @enderror"
                    value="{{ old('location', $hajj->location ?? '') }}">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('rating') is-invalid @enderror"
                    value="{{ old('price', $hajj->price ?? '') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="rating">Hotel Rating</label>
                <input type="number" name="rating" id="rating"
                    class="form-control @error('rating') is-invalid @enderror"
                    value="{{ old('rating', $hajj->rating ?? '') }}">
                @error('rating')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $hajj->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <textarea name="duration" id="duration" rows="3" class="form-control @error('duration') is-invalid @enderror">{{ old('duration', $hajj->duration ?? '') }}</textarea>
                @error('duration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <textarea name="link" id="link" rows="3" class="form-control @error('link') is-invalid @enderror">{{ old('link', $hajj->link ?? '') }}</textarea>
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Save</button>
    </div>
</div>
