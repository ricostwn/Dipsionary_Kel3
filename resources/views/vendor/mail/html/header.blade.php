@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/logo.png') }}" class="logo" alt="Dipsionary">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
