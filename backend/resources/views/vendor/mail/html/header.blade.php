<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img class="block h-16 w-auto" src="{{ asset('img/logo_2.svg') }}" />
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
