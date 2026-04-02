<div class="bg-white rounded-xl p-4 shadow">
    <h3 class="font-bold mb-2">{{ $media->title }}</h3>
    <video controls class="w-full rounded">
        <source src="{{ $media->videourl }}" type="video/mp4">
    </video>
</div>
