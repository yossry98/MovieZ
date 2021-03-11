@props(['image'])
<div class="mt-8">
    <button
    @click="
    isOpen=true
    imageSrc='{{ 'https://image.tmdb.org/t/p/original'.$image['file_path']  }}'
    "
    >

    <img src="https://image.tmdb.org/t/p/w500{{ $image['file_path'] }}" alt="parasite" class="hover:opacity-75
    transition esas-in-out duration-150">
    </button>

</div>
