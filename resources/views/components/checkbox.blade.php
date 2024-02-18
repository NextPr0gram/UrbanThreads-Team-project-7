 @props(['disabled' => false])

 <input type="checkbox"  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border border-1 border-neutral-60 hover:border-neutral-30 checked:border-primary-300 checked:hover:border-primary-300 checked:focus:border-primary-300 rounded-sm focus:outline-none checked:bg-primary-300 checked:hover:bg-primary-300 checked:focus:bg-primary-300 focus:ring-1 focus:ring-primary-300  focus:outline-none focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed']) !!}></input>  



