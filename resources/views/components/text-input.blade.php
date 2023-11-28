@props(['disabled' => false])

<<<<<<< HEAD
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-3 border-bluish-purple p-2 bg-transparent text-black h-13 focus:border-blue-500 focus:ring-blue-500']) !!}>
=======
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
>>>>>>> backend
