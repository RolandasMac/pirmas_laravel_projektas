<form action="{{$baseurl}}">
    @props(['disabled' => false])
    <input @disabled($disabled) name="search" {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }} placeholder="{{$kintamasis}}">
</form>