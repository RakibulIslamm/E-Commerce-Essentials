@php
    $name = $slider['name'];
    $title = $slider['title'];
    $img = $slider['img'];
    $description = $slider['description'];
    $link = $slider['link'];
    $link_text = $slider['link_text'];
@endphp

<tr>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-[14px] p-4 whitespace-nowrap">
        {{ $name }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-[14px] p-4 whitespace-nowrap">
        <img src="{{ $img ?? 'http://ecommerce.astersoftware.it/uploads/img_slider/122.jpg' }}" class="max-w-20 h-auto"
            alt="">
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-[14px] p-4 whitespace-nowrap">
        {{ $link }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-[14px] p-4 whitespace-nowrap">
        {{ $title }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-[14px] p-4 ">
        <div class="flex items-center gap-2">
            <a href="{{ route('app.slider.edit', $slider) }}"
                class="text-gray-100 hover:text-white bg-indigo-500 hover:bg-indigo-600 p-1 rounded" type="button">
                <x-lucide-edit class="w-4 h-4" />
            </a>
            <a href="#" class="text-gray-100 hover:text-white bg-yellow-500 hover:bg-yellow-600 p-1 rounded"
                type="button">
                <x-lucide-arrow-up-from-line class="w-4 h-4" />
            </a>
            <button class="text-gray-100 hover:text-white bg-red-500 hover:bg-red-600 p-1 rounded" type="button">
                <x-lucide-trash class="w-4 h-4" />
            </button>
        </div>
    </td>
</tr>
