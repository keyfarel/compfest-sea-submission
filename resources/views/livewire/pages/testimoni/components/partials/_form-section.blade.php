{{-- Formulir Testimoni --}}
<div class="w-full bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Share Your Experience</h2>

    <form>
        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" placeholder="Your name" class="mt-1 w-full rounded-md border border-gray-300 px-4 py-2 focus:ring focus:ring-green-200 focus:outline-none">
        </div>

        {{-- Location --}}
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="location" name="location" placeholder="City (optional)" class="mt-1 w-full rounded-md border border-gray-300 px-4 py-2 focus:ring focus:ring-green-200 focus:outline-none">
        </div>

        {{-- Rating --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Rating <span class="text-red-500">*</span></label>
            <div class="flex items-center space-x-1 mt-1">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-6 h-6 text-gray-300 hover:text-yellow-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                @endfor
            </div>
        </div>

        {{-- Review --}}
        <div class="mb-6">
            <label for="review" class="block text-sm font-medium text-gray-700">Review <span class="text-red-500">*</span></label>
            <textarea id="review" name="review" rows="4" placeholder="Share your experience with SEA Catering" class="mt-1 w-full rounded-md border border-gray-300 px-4 py-2 resize-y focus:ring focus:ring-green-200 focus:outline-none"></textarea>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
            Submit Review
        </button>
    </form>
</div>
