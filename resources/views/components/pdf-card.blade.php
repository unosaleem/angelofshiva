<div class="bg-white rounded-xl p-4 shadow">
    <h3 class="font-bold mb-2">{{ $media->title }}</h3>
    <a href="{{ Storage::disk('s3')->url($media->attach_file) }}"
       target="_blank"
       class="text-orange-600 font-semibold">Open PDF</a>
</div>
